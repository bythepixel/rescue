<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->insert([
            'name' => 'By the Pixel'
        ]);
        DB::table('organizations')->insert([
            'name' => 'Rescue R Us'
        ]);
        DB::table('organizations')->insert([
            'name' => 'DEAR GOD HELP THEM'
        ]);
        DB::table('organizations')->insert([
            'name' => 'Don\'t let the dogs die'
        ]);
        DB::table('organizations')->insert([
            'name' => 'Dead Ones'
        ]);
    }
}
