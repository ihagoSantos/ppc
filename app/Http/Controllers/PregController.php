<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PregController extends Controller
{
  public function index(){
      return view('preg.home');
  }

  // lista os ppcs finalizados
  public function finalizados(){
    return view('ppc.listarPpcsFinalizados');
  }
}