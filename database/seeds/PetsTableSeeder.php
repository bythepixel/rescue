<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            'name' => 'Yoshi',
            'breed' => 'Great Dane',
            'description' => 'Just the best, except when she eats other dogs.',
            'age' => '8',
            'birth' => null,
            'weight' => 100,
            'fee' => 100000,
            'organizations_id' => 1,
            'species_id' => 1,
            'statuses_id' => 1,
            'created_by' => 1,
            'last_edited_by' => 1,
        ]);
    }
}
