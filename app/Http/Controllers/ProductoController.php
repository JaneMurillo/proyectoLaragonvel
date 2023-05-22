<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\Archivo;
use App\Mail\TestMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::where('user_id',Auth::user()->id)->get(); // get();
        //dd($productos);
        //$productos = User::find(Auth::user()->id)->productos()->get();
        return view('productos.indexProducto', compact ('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.createProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // Delimitar en una cadena
            'nombre' => 'required|string|max:255|min:3',  // con delimitación de caracteres
            'description' => ['required', 'max:255'], 
            'costo' => ['numeric', 'min:1'],
            'user_id' => ['nullable', 'numeric', Rule::exists('users',  'id')],
            'archivo' => ['image']
        ]);
        //dd($request->all());

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->description = $request->description;
        $producto->costo = $request->costo;
        $producto->user_id = Auth::user()->id;
        $producto->save();

        if($request->hasFile('archivo') && $request->file('archivo')->isValid()){
            $ruta = $request->archivo->store('documentos', 'public');
            // Crear registro en tabla archivos
            $archivos = new Archivo();
            $archivos->hash = $ruta;
            $archivos->nombre = $request->archivo->getClientOriginalName();
            $archivos->extension = $request->archivo->guessExtension();
            $archivos->mime = $request->archivo->getMimeType();
            $archivos->producto_id = $producto->id;
            $archivos->save();
        }

        
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Se ha guardado el producto.');

        $mail = new TestMailable($producto);
        Mail::to(Auth::user()->email)->send($mail);

        return redirect('/producto'); // Peticion tipo get

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        // Mostrar de un solo id
        $response = Gate::inspect('view',$producto);

        if($response->denied()){
            abort(403);
        }

        $archivo = Archivo::where('producto_id', $producto->id)->first();

        if ($archivo === null){
            $path = null;
        }
        else {
            $path = "storage/$archivo->hash";
        }

        return view('productos/show-producto', compact('producto', 'path'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        // 
        return view('productos/edit-producto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|min:3',  
            'description' => ['required', 'max:255'], 
            'costo' => ['numeric', 'min:1'],
            'user_id' => ['nullable', 'numeric', Rule::exists('users',  'id')],
        ]);

        $producto->nombre = $request->nombre;
        $producto->description = $request->description;
        $producto->costo = $request->costo;
        $producto->user_id = Auth::user()->id;
        $producto->save();

        return redirect()->route('producto.index');
    }

    
    public function pdf()
    {
        $productos = Producto::paginate();

        return view('producto', compact('productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $archivo = Archivo::where('producto_id', $producto->id)->first();

        $path = $archivo->hash;

        Storage::disk('public')->delete($path);

        $archivo->delete();
        $producto->delete();
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addError('Se eliminado el producto.');
        return redirect()->route('producto.index');
    }

    // public function store(Request $request)
    // {
        
    // }

    public function descargar(Archivo $archivo)
    {
        return Storage::download($archivo->hash, $archivo->nombre,
            ['Content-Type' => $archivo->mime]);
    }

}