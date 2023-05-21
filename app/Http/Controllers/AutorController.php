<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Producto;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::all();
        return view('autores.indexAutor', compact ('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('autores.createAutor', compact ('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nombre' => 'required|string|max:255|min:3',  // con delimitación de caracteres
            'description' => ['required', 'max:255'], 
        ]);

        $autor = new Autor();
        $autor->nombre = $request->nombre;
        $autor->description = $request->description;
        $autor->save();
        $autor->productos()->attach($request->producto_ids, ['date'=>now()]);

        return redirect('/autor'); // Peticion tipo get
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        return view('autores/show-autor', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        return view('autores/edit-autor', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|min:3',  
            'description' => ['required', 'max:255'],
        ]);

        $autor->nombre = $request->nombre;
        $autor->description = $request->description;
        $autor->save();

        return redirect()->route('autor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect()->route('autor.index');
    }
}
