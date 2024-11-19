<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ruta del archivo
        $file = storage_path('app/private/generos.csv');
        
        // Abre el archivo CSV
        $data = array_map('str_getcsv', file($file));

        // Opcional: Si la primera fila tiene encabezados, elimínala
        $headers = array_shift($data);

        // Inserta los datos en la base de datos
        foreach ($data as $row) {
            // Crea un array asociativo usando los encabezados
            $rowData = array_combine($headers, $row);

            // Inserta los datos en la tabla
            DB::table('genres')->insert([
                'id' => $rowData['id'],
                'name' => $rowData['name']
            ]);
        }
    }
}
