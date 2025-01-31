<?php

namespace Database\Seeders;

use App\Models\Idioma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdiomaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Idioma::create([
            'nome' => 'Português',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Idioma::create([
            'nome' => 'Inglês',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
