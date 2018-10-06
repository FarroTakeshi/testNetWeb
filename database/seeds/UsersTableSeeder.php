<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'id'         => 1,
                'username'   => 'admin1',
                'first_name' => 'Takeshi',
                'last_name'  => 'F',
                'password'   => bcrypt('secret'),
                'role_id'    => 1,
            ],
            [
                'id'         => 2,
                'username'   => 'client1',
                'first_name' => 'Lizbeth',
                'last_name'  => 'M',
                'password'   => bcrypt('secret'),
                'role_id'    => 2,
            ]
        ]);
    }
}
