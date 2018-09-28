<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeciesHasOrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species_has_organizations')->insert([
            'species_id' => 1,
            'organization_id' => 1,
        ]);

        DB::table('species_has_organizations')->insert([
            'species_id' => 1,
            'organization_id' => 2,
        ]);

        DB::table('species_has_organizations')->insert([
            'species_id' => 1,
            'organization_id' => 3,
        ]);

        DB::table('species_has_organizations')->insert([
            'species_id' => 1,
            'organization_id' => 4,
        ]);

        DB::table('species_has_organizations')->insert([
            'species_id' => 1,
            'organization_id' => 5,
        ]);
    }
}
