<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Mensaje;
use App\PostView;
use App\Categoria;
use App\Mensaje_Cat;
use \Carbon\Carbon;
use DB;

class MessagesController extends Controller
{
    //guardar datos del comentario y crear contador
    public function GrabarPost(Request $request){
      $this->validate($request, [
        'titulo'=>'required',
        'mensaje'=>'required',
        'sucedio_fecha'=>'require'
      ]);

      //subir archivo
      if ($request->hasFile('archivo')) {
        // get file with extetnsion
        $filewithext = $request->file('archivo')->getClientOriginalName();

        //get just get filename
        $filename = pathinfo($filewithext, PATHINFO_FILENAME);

        //get just ext
        $extension = $request->file('archivo')->getClientOriginalExtension();

        //filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        //upload file
        $path = $request->file('archivo')->storeAs('public/images',$fileNameToStore);
      }
      else {
        $fileNameToStore = 'NoImage.jpeg';
      }


      $mensajes = new Mensaje;
      if ($request->input('nombre') == '') {
          $mensajes->nombre = 'Anonimo';
      }
      else {
        $mensajes->nombre = $request->input('nombre');
      }


      if ($request->input('compania')=='') {
        $mensajes->compania = 'Sin Nombre';
      }
      else {
        $mensajes->compania = $request->input('compania');
      }
      $mensajes->mensaje = $request->input('mensaje');
      if ($request->input('date') == '') {
        $mensajes->sucedio_fecha = Carbon::now();
      }
      else {
        $mensajes->sucedio_fecha = $request->input('date');
      }

      $mensajes->titulo = $request->input('titulo');
      $mensajes->calificacion = '5';
      $mensajes->evidencia_ruta = $fileNameToStore;

      $mensajes->save();

      //grabar id de la visitas en la tabla de PostViews
      $visita_id = new PostView;
      $visita_id->viewable_id = $mensajes->id;
      $visita_id->save();

      //grabar id de la categoria de post
      $categoria_id = new Mensaje_Cat;
      $categoria_id->id_cat = $request->input('categorias');
      $categoria_id->id_post = $mensajes->id;
      $categoria_id->save();


      Return redirect('/')->with('exito','Mensaje Guardado');
    }

    //mostrar todos lo mensajes y  en listarlos por fecha
    public function verMensaje(){

      //$mensajes = Mensaje::all()->sortBy('created_at');


     $mensajes = DB::table('mensajes')
      ->join('post_views','post_views.viewable_id','=','mensajes.id')
      ->join('mensaje_cats','mensaje_cats.id_post','=','mensajes.id')
       ->join('categorias','categorias.id','=','mensaje_cats.id_cat')
      ->select('mensajes.id','mensajes.titulo','mensajes.compania','mensajes.mensaje',
      'mensajes.created_at','post_views.views','categorias.categoria')
      ->orderBy('mensajes.created_at', 'DESC')
      ->paginate(5);

         //enviar a la vista numero de visistas que a tenido cada post

         return view('mensajes')->with('mensaje',$mensajes);

    }

    //mostrar los 10 mensajes mas nuevos
    public function DiezNuevos(){
      $mensajes = DB::table('mensajes')
      ->orderBy('created_at', 'DESC')->take(10)->get();

      //enviar a la vista numero de visistas que a tenido cada post
      return view('inc.topmensajes')->with('mensaje', $mensajes);
      //return view('home')->with('mensaje',$mensajes);
    }

    //mostrar detalles del post seleccionado
    public function verDetalles($id)
    {
       $detalle = Mensaje::find($id);
       //$visita_id = PostView::where('viewable_id','=',$id)->get();
       //incrementar el contador de visistas
       $visita_id = PostView::where('viewable_id','=',$id)->Increment('views',1);

      Return view('mensaje_post',['detalles' => $detalle]);

    }

    //mostrar post por compania
    public function porCompania($compania)
    {
       $resultado = Mensaje::where('compania', '=', $compania)->get();

       Return view('compania_post')->with('resultados', $resultado);
    }
}
