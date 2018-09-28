<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'Intake',
            'organization_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Under Evaluation',
            'organization_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Needs Foster',
            'organization_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Has Foster',
            'organization_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Available',
            'organization_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Adopted',
            'organization_id' => 1,
        ]);
    }
}
