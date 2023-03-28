<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        // Almacenar el tipo de usuario en una variable de sesión
        $user_type = request()->input('user_type');
        return view('welcome')->with
            (['user_type' => $user_type]);
    }

    public function userType(Request $request) {
        $isChecked = $request->input('isChecked');
        session(['user_type' => $isChecked]);
        return response()->json(['success' => true]);
    }
}
