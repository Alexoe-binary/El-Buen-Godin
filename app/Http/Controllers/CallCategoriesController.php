<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CallCategoriesController extends Controller
{
    public function verCategorias(){

      $categorias = Categoria::pluck('Categoria','id');

      return view ('dilo')->with('categorias',$categorias);

    }
}
