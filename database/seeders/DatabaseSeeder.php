<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
            $this->call(UserSeeder::class);

            $this->call(OrgaoSeeder::class);
            $this->call(EmpresaSeeder::class);
            $this->call(AditivoSeeder::class);
            $this->call(ContratoSeeder::class);
            $this->call(ConvenioSeeder::class);
            $this->call(PermissionsSeeder::class);
    }
}
