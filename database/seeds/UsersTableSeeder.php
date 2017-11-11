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
        DB::table('users')->insert(
        	[
        		'email'		=>	'admin@admin.com',
        		'password'	=>	bcrypt('12345'),
        		'name'		=>	'Admin',
        		'role'		=>	5,
        		'active'	=>	1,
        	]
        );
    }
}
