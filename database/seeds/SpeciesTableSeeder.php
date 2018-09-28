<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species')->insert([
            'name' => 'Dog',
        ]);

        DB::table('species')->insert([
            'name' => 'Cat',
        ]);

        DB::table('species')->insert([
            'name' => 'Bird',
        ]);

        DB::table('species')->insert([
            'name' => 'Horse',
        ]);

        DB::table('species')->insert([
            'name' => 'Snake',
        ]);
    }
}
