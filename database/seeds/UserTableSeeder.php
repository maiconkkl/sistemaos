<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Roles;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::table('roles_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user = User::create([
            'name' => 'Administrador',
            'email' => 'suporte@implanti.com.br',
            'email_verified_at' => Carbon::now()->timestamp,
            'password' => Hash::make('88256564aA#'),
        ]);
        $role_admin = Roles::where('key', 'admin')->first();
        DB::table('roles_user')->insert([
            'user_id' => $user->id,
            'roles_id' => $role_admin->id,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

    }
}
