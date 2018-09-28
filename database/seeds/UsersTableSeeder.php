<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'first_name' => 'Heath',
            'last_name' => 'Naylor',
            'email' => 'heath@bythepixel.com',
            'password' => bcrypt('asdf'),
            'role' => '',
            'organizations_id' => '',
        ]);
    }
}
