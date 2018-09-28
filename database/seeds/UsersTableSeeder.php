<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Heath',
            'last_name' => 'Naylor',
            'email' => 'heath@bythepixel.com',
            'password' => Hash::make('asdf'),
            'roles_id' => 1,
            'organization_id' => 1,
        ]);
        DB::table('users')->insert([
            'first_name' => 'Turner',
            'last_name' => 'Walters',
            'email' => 'turner@bythepixel.com',
            'password' => Hash::make('asdf'),
            'roles_id' => 1,
            'organization_id' => 1,
        ]);
        DB::table('users')->insert([
            'first_name' => 'Elliot',
            'last_name' => 'Regan',
            'email' => 'elliot@bythepixel.com',
            'password' => Hash::make('asdf'),
            'roles_id' => 1,
            'organization_id' => 1,
        ]);
    }
}
