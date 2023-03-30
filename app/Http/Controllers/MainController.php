<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MainController extends Controller
{
    public function index(){

        return view('welcome');
    }

    public function getUsers()
    {
        try {
            $users = \DB::table('users')->get();

            return view('send')->with([
                'users' => $users
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function userType(){
        $tipoUser = request()->input('user_type');
        session(['user_type' => $tipoUser]);



        return view('user.user_session')->with([
            'user_type' => $tipoUser
        ]);
    }

    public function shareType(){
        $shareUser = request()->input('user_type');
        session(['user_type' => $shareUser]);

        return view('user.user_session')->with([
            'user_type' => $shareUser
        ]);
    }

    public function createUser(){

        $data = [
            $user_nombre = request()->nombre,
            $user_dni = request()->dni,
            $user_vat = request()->vat,
            $user_type = request()->input('user_type')
        ];
        dd($data);
    }


    public function getUser(){
        $user = request()->all();
        dd($user);
    }

}


