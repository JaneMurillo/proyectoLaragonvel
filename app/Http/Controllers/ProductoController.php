<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all(); // get();
        //dd($productos);
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
        ]);
        //dd($request->all());

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->description = $request->description;
        $producto->costo = $request->costo;
        $producto->save();

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
        return view('productos/show-producto', compact('producto'));
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
        ]);

        $producto->nombre = $request->nombre;
        $producto->description = $request->description;
        $producto->costo = $request->costo;
        $producto->save();

        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }
}