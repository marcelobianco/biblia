<?php

namespace Database\Seeders;

use App\Models\Versao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VersoesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'nome' => '1969 - Almeida Revisada e Corrigida',
                'abreviacao' => 'RC69',
                'idioma_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Nova Versão Internacional',
                'abreviacao' => 'NVI',
                'idioma_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Nova Versão Transformadora',
                'abreviacao' => 'NVT',
                'idioma_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Nova Almeida Aualizada',
                'abreviacao' => 'NAA',
                'idioma_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Nova Tradução na Linguagem de Hoje',
                'abreviacao' => 'NTLH',
                'idioma_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'New International Version',
                'abreviacao' => 'NIV',
                'idioma_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'King James Atualizada',
                'abreviacao' => 'KJA',
                'idioma_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Basic English Bible',
                'abreviacao' => 'BBE',
                'idioma_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        Versao::insert($array);
        
    }
}
