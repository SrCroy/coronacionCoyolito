<?php

namespace App\Http\Controllers;

use App\Models\Candidatas;

abstract class Controller
{
    public function index(){
        $candidatas = Candidatas::all();
        return view('inicio',compact('candidatas'));
    }
}
