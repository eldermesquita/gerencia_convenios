<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Adding an admin user
        $user = Usuario::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
            ]);

        $this->call(UsuarioSeeder::class);
        $this->call(OrgaoSeeder::class);
        $this->call(ConvenioSeeder::class);
        $this->call(AditivoSeeder::class);
        $this->call(ContratoSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(ParlamentarSeeder::class);
      // $this->call(ModalidadeSeeder::class);
      //  $this->call(UsuarioSeeder::class);
    }
}
