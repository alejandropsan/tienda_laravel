<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Controllers\MainController;

class ProductController extends Controller
{
    public function index(){
        // QUERY BUILDER
        // $products = DB::table('products')->get();

        // ELOQUENT
        $products = Product::all();

        // Así simplemente devuelve los datos en formato JSON
        //return $products;

        return view('products.index')->with([
            'products' => $products
        ]);
    }


    public function create(){
        return view('create');
    }


    public function store(){

        // VALIDACIÓN DE DATOS ENVIADOS POR EL USUARIO
        $reglas = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available, unavailable']
        ];

        request()->validate($reglas);

        if(request()->status == 'available' && request()->stock == 0){

            // ASÍ SE CREAN SESSIONES PERO PERSISTEN Y NO DESAPARECEN
            //session()->put('error', 'Si está disponible debe tener un stock');

            // ASÍ SE CREAN Y SE BORRAN EN LA SIGUIENTE PETICIÓN
            // session()->flash('error', 'Si está disponible debe tener un stock');

            return redirect()
                ->back()
                ->withInput(request()->all())
                // CON WITHERRORS SE MUESTRAN LOS ERRORES SIN LA NECESIDAD DE LA SESIÓN ERROR
                ->withErrors('Si está disponible debe tener un stock');
        }

        // ASÍ SE BORRAN SESSIONES, AUNQUE NO EXISTA NO VA A FALLAR
        // session()->forget('error');

        // CREAR PRODUCTO PARÁMETRO A PARÁMETRO
        // $product = Product::create([
        //     'title' => request()->title,
        //     'description' => request()->description,
        //     'price' => request()->price,
        //     'stock' => request()->stock,
        //     'status' => request()->status
        // ]);

        // CREAR DE FORMA MÁS SENCILLA
        $product = Product::create(request()->all());


        // CREAMOS UNA SESIÓN DE ÉXITO PARA QUE LA RECIBA EL USUARIO
        // AQUÍ YA COMENTAMOS LA SESSION SUCCESS PORQUE LA IMPLEMENTAMOS CON EL WITH(SUCCESS)
        // session()->flash('success', "El producto con id {$product->id} ha sido creado");
        // DIFERENTES FORMAS DE REDIRECCIÓN DEL USUARIO

        // return redirect()->back();
        // return redirect()->action([MainController::class, 'index']);
         return redirect()
         ->route('products.index')
         // EN REALIDAD ES UN WITH, EN SUCCESS PUEDES PONER LA VARIABLE QUE SE QUIERA
         // EN REALIDAD FUNCIONA DE ESTA MANERA. ES DIFERENTE A WITHERRORS QUE VA A LA VARIABLE GLOBAL ERRORS
        //  ->with('success' => 'xxxx');
         ->withSuccess("El producto con id {$product->id} ha sido creado");
    }

    public function show($product){
        // QUERY BUILDER
        //$product = DB::table('products')->where('id', $product)->get();

        // Esta consulta te muestra una array del producto sin supervitaminado
        // $product = DB::table('products')->where('id', $product)->first();
        // Consulta más corta
        // $product = DB::table('products')->find($product);


        // ELOQUENT
        // $product = Product::find($product);
        // Si no existe el producto devuelve una vista 404
        $product = Product::findOrFail($product);

        //return $product;

        return view('show')->with([
            'product' => $product,
            'html' => "<h2>Subtitle</h2>"
        ]);
    }

    public function edit($product){

        // SE PUEDE HACER CON VARIABLE TEMPORAL
        // $product = Product::findOrFail($product);

        return view('edit')->with([
            // O DIRECTAMENTE PASÁNDO LA INFORMACIÓN A LA VISTA
            'product' => Product::findOrFail($product)
        ]);
    }

    public function update($product){
        // VALIDACIÓN DE DATOS ENVIADOS POR EL USUARIO
        $reglas = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available, unavailable']
        ];

        request()->validate($reglas);



        $product = Product::findOrFail($product);
        $product->update(request()->all());

        return redirect()
            ->route('products.index')
            ->withSuccess("El producto con id {$product->id} ha sido editado correctamente");
    }

    public function destroy($product){

        $product = Product::findOrFail($product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess("El producto con id {$product->id} ha sido eliminado correctamente");
    }
}
