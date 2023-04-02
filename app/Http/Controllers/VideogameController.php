<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideogameController extends Controller
{
    public function index(){
        return view('select.videogames');
    }
}
