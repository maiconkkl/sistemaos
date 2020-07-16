<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Roles::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Roles::create([
            'name' => 'Administrador',
            'key' => 'admin',
        ]);

        Roles::create([
            'name' => 'Visualizar Revenda',
            'key' => 'view_revenda',
        ]);
        Roles::create([
            'name' => 'Criar Revenda',
            'key' => 'create_revenda',
        ]);
        Roles::create([
            'name' => 'Editar Revenda',
            'key' => 'update_revenda',
        ]);
        Roles::create([
            'name' => 'Deletar Revenda',
            'key' => 'delete_revenda',
        ]);
        Roles::create([
            'name' => 'Listar Revenda',
            'key' => 'list_revenda',
        ]);

        # Clientes Priorios
        Roles::create([
            'name' => 'Visualizar Clientes Proprios',
            'key' => 'view_cliente_proprio',
        ]);
        Roles::create([
            'name' => 'Criar Cliente Proprio',
            'key' => 'create_cliente_proprio',
        ]);
        Roles::create([
            'name' => 'Editar Cliente Proprio',
            'key' => 'update_cliente_proprio',
        ]);
        Roles::create([
            'name' => 'Deletar Cliente Proprio',
            'key' => 'delete_cliente_proprio',
        ]);
        Roles::create([
            'name' => 'Listar Cliente Proprio',
            'key' => 'list_cliente_proprio',
        ]);

        # Clientes
        Roles::create([
            'name' => 'Visualizar Cliente',
            'key' => 'view_cliente',
        ]);
        Roles::create([
            'name' => 'Criar Cliente',
            'key' => 'create_cliente',
        ]);
        Roles::create([
            'name' => 'Editar Cliente',
            'key' => 'update_cliente',
        ]);
        Roles::create([
            'name' => 'Deletar Cliente',
            'key' => 'delete_cliente',
        ]);
        Roles::create([
            'name' => 'Listar Cliente',
            'key' => 'list_cliente',
        ]);


        Roles::create([
            'name' => 'Visualizar Plano',
            'key' => 'view_plano',
        ]);
        Roles::create([
            'name' => 'Criar Plano',
            'key' => 'create_plano',
        ]);
        Roles::create([
            'name' => 'Editar Plano',
            'key' => 'update_plano',
        ]);
        Roles::create([
            'name' => 'Deletar Plano',
            'key' => 'delete_plano',
        ]);
        Roles::create([
            'name' => 'Listar Plano',
            'key' => 'list_plano',
        ]);


        Roles::create([
            'name' => 'Visualizar Software',
            'key' => 'view_software',
        ]);
        Roles::create([
            'name' => 'Criar Software',
            'key' => 'create_software',
        ]);
        Roles::create([
            'name' => 'Editar Software',
            'key' => 'update_software',
        ]);
        Roles::create([
            'name' => 'Deletar Software',
            'key' => 'delete_software',
        ]);
        Roles::create([
            'name' => 'Listar Software',
            'key' => 'list_software',
        ]);


        Roles::create([
            'name' => 'Visualizar Versão do Software',
            'key' => 'view_version_software',
        ]);
        Roles::create([
            'name' => 'Criar Versão do Software',
            'key' => 'create_version_software',
        ]);
        Roles::create([
            'name' => 'Editar Versão do Software',
            'key' => 'update_version_software',
        ]);
        Roles::create([
            'name' => 'Deletar Versão do Software',
            'key' => 'delete_version_software',
        ]);
        Roles::create([
            'name' => 'Listar Versão do Software',
            'key' => 'list_version_software',
        ]);


        Roles::create([
            'name' => 'Listar Modulo do Software',
            'key' => 'list_software_modulo',
        ]);
        Roles::create([
            'name' => 'Visualizar Modulo do Software',
            'key' => 'view_software_modulo',
        ]);
        Roles::create([
            'name' => 'Criar Modulo do Software',
            'key' => 'create_software_modulo',
        ]);
        Roles::create([
            'name' => 'Editar Modulo do Software',
            'key' => 'update_software_modulo',
        ]);
        Roles::create([
            'name' => 'Deletar Modulo do Software',
            'key' => 'delete_software_modulo',
        ]);


        Roles::create([
            'name' => 'Listar Serviço do Software',
            'key' => 'list_software_servico',
        ]);
        Roles::create([
            'name' => 'Visualizar Serviço do Software',
            'key' => 'view_software_servico',
        ]);
        Roles::create([
            'name' => 'Criar Serviço do Software',
            'key' => 'create_software_servico',
        ]);
        Roles::create([
            'name' => 'Editar Serviço do Software',
            'key' => 'update_software_servico',
        ]);
        Roles::create([
            'name' => 'Deletar Serviço do Software',
            'key' => 'delete_software_servico',
        ]);

    }
}
