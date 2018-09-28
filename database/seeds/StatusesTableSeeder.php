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
            'organizations_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Under Evaluation',
            'organizations_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Needs Foster',
            'organizations_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Has Foster',
            'organizations_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Available',
            'organizations_id' => 1,
        ]);

        DB::table('statuses')->insert([
            'name' => 'Adopted',
            'organizations_id' => 1,
        ]);
    }
}
