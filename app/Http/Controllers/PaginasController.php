<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    //
    public function canciones($id = null){
        $canciones = [];
        $canciones[] = ['nombre' => 'Outside', 'artista' => 'Calvin Harris'];
        $canciones[] = ['nombre' => 'Bad girls', 'artista' => 'MIA'];

        if(!is_null($id)) {
            $cancion = $canciones[$id];
        } else {
            $cancion = null;
        }

        return view('canciones', compact('canciones', 'cancion'));
    }


    public function contacto(){
        return view('contacto');
    }

    /*public function postContacto(){
        dd('EJUCUTO postContacto');
    }*/

    public function postContacto(Request $request){ // Injección de dependencias
        //dd($request); // Todo
        //dd($request->all()); // Más especifico
        //dd($request->input('nombre')); // Solo nombre
        //dd($request->nombre); // Otra forma de poner la variable
        //dd($request->nombre, $request->codigo);
        
        // Validar información
            // En la documentación hay una serie de validation rules
        $request->validate([
            // Delimitar en una cadena
            'nombre' => 'required|string|max:255|min:3',  // con delimitación de caracteres
            // Delimitar en un arreglo
            'codigo' => ['required', 'integer', 'max:100'], 

        ]); // Recibe un arreglo

        dd('Si pasó la validación');




        // Guardar a DB

        // Redireccionar a otra URL

    }
}
