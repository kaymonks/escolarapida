<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios1 = Permissao::firstOrCreate([
            'nome' =>'usuario-view',
            'descricao' =>'Acesso a lista de Usuários'
        ]);
        $usuarios2 = Permissao::firstOrCreate([
            'nome' =>'usuario-create',
            'descricao' =>'Adicionar Usuários'
        ]);
        $usuarios2 = Permissao::firstOrCreate([
            'nome' =>'usuario-edit',
            'descricao' =>'Editar Usuários'
        ]);
        $usuarios3 = Permissao::firstOrCreate([
            'nome' =>'usuario-delete',
            'descricao' =>'Deletar Usuários'
        ]);

        $escolas1 = Permissao::firstOrCreate([
            'nome' => 'responsavel-view',
            'descricao' => 'Acesso a lista de responsáveis'
        ]);

        $escolas2 = Permissao::firstOrCreate([
            'nome' => 'responsavel-create',
            'descricao' => 'Adicionar responsáveis'
        ]);

        $escolas3 = Permissao::firstOrCreate([
            'nome' => 'responsavel-edit',
            'descricao' => 'Editar responsáveis'
        ]);

        $escolas4 = Permissao::firstOrCreate([
            'nome' => 'responsavel-delete',
            'descricao' => 'Deletar alunos'
        ]);

        $escolas5 = Permissao::firstOrCreate([
            'nome' => 'aluno-view',
            'descricao' => 'Acesso a lista de alunos'
        ]);

        $escolas6 = Permissao::firstOrCreate([
            'nome' => 'aluno-create',
            'descricao' => 'Adicionar alunos'
        ]);

        $escolas7 = Permissao::firstOrCreate([
            'nome' => 'aluno-edit',
            'descricao' => 'Editar alunos'
        ]);

        $escolas8 = Permissao::firstOrCreate([
            'nome' => 'aluno-delete',
            'descricao' => 'Deletar alunos'
        ]);

        $escolas9 = Permissao::firstOrCreate([
            'nome' => 'evento-view',
            'descricao' => 'Acesso a lista de eventos'
        ]);

        $escolas10 = Permissao::firstOrCreate([
            'nome' => 'evento-create',
            'descricao' => 'Adicionar eventos'
        ]);

        $escola11 = Permissao::firstOrCreate([
            'nome' => 'evento-edit',
            'descricao' => 'Editar eventos'
        ]);

        $escolas12 = Permissao::firstOrCreate([
            'nome' => 'evento-delete',
            'descricao' => 'Deletar eventos'
        ]);

        $papeis1 = Permissao::firstOrCreate([
            'nome' =>'papel-view',
            'descricao' =>'Listar Papéis'
        ]);
        $papeis2 = Permissao::firstOrCreate([
            'nome' =>'papel-create',
            'descricao' =>'Adicionar Papéis'
        ]);
        $papeis3 = Permissao::firstOrCreate([
            'nome' =>'papel-edit',
            'descricao' =>'Editar Papéis'
        ]);

        $papeis4 = Permissao::firstOrCreate([
            'nome' =>'papel-delete',
            'descricao' =>'Deletar Papéis'
        ]);

        echo "Registros de Permissoes criados no sistema";
    }
}
