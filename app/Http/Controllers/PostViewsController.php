<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;
use App\PostView;

class PostViewsController extends Controller
{
    public function Visita($id){

      $fp = PostView::find($id);
        


    }
}
