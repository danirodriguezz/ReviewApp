<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ruta del archivo
        $file = storage_path('app/private/series.csv');
        
        // Abre el archivo CSV
        $data = array_map('str_getcsv', file($file));

        // Opcional: Si la primera fila tiene encabezados, elimínala
        $headers = array_shift($data);

        // Inserta los datos en la base de datos
        foreach ($data as $row) {
            // Si la fila no tiene el mismo número de elementos que los encabezados, la ignoramos
            if (count($row) !== count($headers)) {
                continue;
            }
            // Crea un array asociativo usando los encabezados
            $rowData = array_combine($headers, $row);
            
            // Inserta los datos en la tabla
            DB::table('series')->insert([
                'id' => $rowData['id'],
                'titulo' => $rowData['titulo'],
                'descripción' => $rowData['descripcion'],
                'fecha_lanzamiento' => $rowData['fecha_lanzamiento'],
                'puntuacion' => $rowData['puntuacion'],
                'imagen_path' => $rowData['imagen_url'],
                'banner_path' => $rowData['banner_url']
            ]);
        } 
    }
}
