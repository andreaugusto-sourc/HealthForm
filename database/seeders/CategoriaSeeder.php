<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nome' => 'Saúde Mental e Bem-Estar',
            ],
            [
                'nome' => 'Vulnerabilidade Social',
            ],
            [
                'nome' => 'Insegurança Alimentar',
            ],
            [
                'nome' => 'Efeitos Pós-Pandemia',
            ],
            [
                'nome' => 'Inclusão e Diversidade',
            ],
            [
                'nome' => 'Acesso a Auxilios Escolares',
            ],
            [
                'nome' => 'Apoio Familiar e Comunitário'
            ],
            [
                'nome' => 'Habitação e Infraestrutura'
            ],
            [
                'nome' => 'Educação e Aprendizagem'
            ]
        ]);
    }
}
