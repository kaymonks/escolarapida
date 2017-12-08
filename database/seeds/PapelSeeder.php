<?php

use Illuminate\Database\Seeder;
use App\Papel;

class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Papel::firstOrCreate([
            'nome' => 'Admin',
            'descricao' => 'Acesso de administrador'
        ]);

        $p2 = Papel::firstOrCreate([
           'nome' =>  'Escola',
            'descricao' => 'Administrador da escola'
        ]);

        $p3 = Papel::firstOrCreate([
            'nome' => 'Professor',
            'descricao' => 'Acesso ao sistema como professor'
        ]);

        $p4 = Papel::firstOrCreate([
            'nome' => 'Responsável',
            'descricao' => 'Acesso ao sistema como responsável'
        ]);

        echo "Papeis criados com sucesso";
    }
}
