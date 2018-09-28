<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OrganizationsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            SpeciesTableSeeder::class,
            SpeciesHasOrganizationsTableSeeder::class,
            StatusesTableSeeder::class,
            PetsTableSeeder::class,
        ]);
    }
}
