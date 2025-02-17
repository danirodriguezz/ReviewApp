<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        return view('movies.mymovies');
    }

    public function show($id)
    {

        // Buscamos la pelicula
        $movie = Movie::find($id);
        $genres = $movie->genres;
        // Si no existe, muestra una página 404 personalizada
        if (!$movie) {
            abort(404, 'Película no encontrada');
        }
        // Devolvemos la vista con los datos de la pelicula
        return view('movies.details', [
            "movie" => $movie,
            "genres" => $genres
        ]);
    }
}
