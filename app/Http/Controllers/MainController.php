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



    public function userType(Request $request) {
        $isChecked = $request->input('isChecked');
        session(['user_type' => $isChecked]);
        return response()->json(['success' => true]);
    }

    public function getUser($user){
        $user = User::findOrFail($user);

         return view('get.user')->with([
            'user' => $user
         ]);
    }

}
