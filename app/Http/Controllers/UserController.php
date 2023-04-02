<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function index(){
        return view('users/register');
    }


    public function registerSave(Request $request){
        // RECOGER LOS DATOS POR POST
        $dataPost = $request->except('_token');

        // VERIFICAR QUE TODOS LOS CAMPOS HAYAN SIDO RELLENADOS
        $filteredDataPost = array_filter($dataPost, function($value){
            return !is_null($value);
        });

        // SI TODOS LOS CAMPOS HAN SIDO RELLENADOS...
        if(count($filteredDataPost) === count($dataPost)){
            $arrayValidata = [
                'nombre' => ['required', 'max:30'],
                'apellidos' => ['required', 'max:100'],
                'edad' => ['required','min:1', 'max:150'],
                'ciudad' => ['required', 'max:30'],
                'rol_user' => ['required', 'in:particular, empresa'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:8']
            ];

                // VALIDAR LOS DATOS
            $dataValidata = $request->validate($arrayValidata);
            if($dataValidata){

                // SI ES ÉXITOSA LA VALIDACIÓN, ENCRIPTAR CONTRASEÑA
                $pwd = hash('sha256', request()->password);

                // CREAR NUEVO USUARIO
                $user = new User();
                $user->nombre = $dataPost['nombre'];
                $user->apellidos = $dataPost['apellidos'];
                $user->edad = $dataPost['edad'];
                $user->ciudad = $dataPost['ciudad'];
                $user->rol_user = $dataPost['rol_user'];
                $user->email = $dataPost['email'];
                $user->password = $pwd;

                // INSERTAR USUARIO
                $user->save();

                // RETURN
                return view('welcome')
                    ->with([
                        'user' => $user
                    ])
                    ->withSuccess("El usuario se ha creado correctamente");

                // GUARDAR AL USUARIO EN LA BASE DE DATOS
                // $newUser = User::create($dataPost);

                // return view('products.index')
                //     ->with([
                //         'newUser' => $newUser
                //     ])
                //     ->withSuccess("El usuario se ha creado correctamente");

            }else{
                // SI NO SE VALIDAN, DEVOLVER UN MENSAJE DE ERROR
                return redirect()
                    ->back()
                    ->withInput(request()->all())
                    ->withErrors("Los datos introducidos no son válidos");
            }
        }else{
            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors("Porfavor rellena todos los campos del formulario");
        }

    }



    public function login(){
        // RECOGER LOS DATOS POR POST DE USUARIO
        $getdata = request()->except('_token');

        // COMPROBAR QUE EL USUARIO HA RELLENADO TODOS LOS CAMPOS
        $filterData = array_filter($getdata, function($value){
            return $value !== null;
        });

        // SI HA RELLENADO TODOS LOS CAMPOS...
        if(count($filterData) == count($getdata)){
            // SE CREA UN ARRAY DE VALIDACIÓN
            $arrayValidata = [
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8']
            ];

            // SE COMPRUEBA LA VALIDACIÓN CON LOS DATOS RECOGIDOS
            $dataValidata = request()->validate($arrayValidata);

            // SI LA VALIDACIÓN ES EXITOSA...
                if($dataValidata){
                // SE PROCEDE A COMPROBAR EL EMAIL EN LA BASE DE DATOS
                $user = User::where('email', request()->email)->first();

                // SI EXISTE EL EMAIL...
                    if($user){
                        // SE ENCRIPTA LA CONTRASEÑA INTRODUCIDA
                        $pwd = hash('sha256', request()->password);
                        // SE PROCEDE A COMPARAR LA CONTRASEÑA INTRODUCIDA CON LA INCLUIDA EN LA BASE DE DATOS
                        // SI LA CONTRASEÑA ES CORRECTA...
                        if($pwd == $user->password){
                            // SE REDIRIGE AL USUARIO A LA PÁGINA PRINCIPAL Y SE CREAN LAS COOKIES CON EL ID Y EL NOMBRE DEL USUARIO
                            $cookieId = Cookie::make('login_id', $user->id, 43200);
                            $cookieName = Cookie::make('login_name', $user->nombre, 43200);
                            return redirect()->route('welcome')
                                ->withCookie($cookieId)
                                ->withCookie($cookieName);
                        }else {
                            return back()
                            ->withErrors('La contraseña es incorrecta');
                        }
                    }else{
                        return back()
                            ->withErrors('El email no existe');
                    }
                }else {
                    return back()
                        ->withErrors('El email y contraseña no son válidos');
                }
        }else{
            return back()
                ->withErrors('Porfavor, rellena todos los campos');
        }
    }



    public function logout(){
        // SE ELIMINA LAS COOKIES
        Cookie::queue(Cookie::forget('login_id'));
        Cookie::queue(Cookie::forget('login_name'));

        return redirect()->route('login');
    }
}
