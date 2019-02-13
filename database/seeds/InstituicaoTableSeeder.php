<?php

use Illuminate\Database\Seeder;

class InstituicaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instituicao')->insert([
            'nome' => 'INSTITUTO FEDERAL DE EDUCACAO, CIENCIA E TECNOLOGIA DO CEARA',
            'razaoSocial' => 'razaoSocial',
            'cnpj' => '10.744.098/0007-30',
        ]);
    }
}
