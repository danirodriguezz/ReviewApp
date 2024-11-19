<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ruta del archivo
        $file = storage_path('app/private/peliculas.csv');
        
        // Abre el archivo CSV
        $data = array_map('str_getcsv', file($file));

        // Opcional: Si la primera fila tiene encabezados, elimínala
        $headers = array_shift($data);

        // Inserta los datos en la base de datos
        foreach ($data as $movie) {
            // Crea un array asociativo usando los encabezados
            $rowData = array_combine($headers, $movie);
            $generos = json_decode($rowData['genero_id'], true);
            
            foreach ($generos as $key => $genero_id) {
                // Inserta los datos en la tabla
                DB::table('genre_movie')->insert([
                    'movies_id' => $rowData['id'],
                    'genres_id' => $genero_id
                ]);
            }
        }
    }
}
