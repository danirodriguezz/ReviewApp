<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function show($id)
    {

        // Buscamos la pelicula
        $serie = Serie::find($id);
        // Si no existe, muestra una página 404 personalizada
         if (!$serie) {
            abort(404, 'Película no encontrada');
        }
        // Devolvemos la vista con los datos de la pelicula
        return view('series.details', [
            "serie" => $serie
        ]);
    }
}
