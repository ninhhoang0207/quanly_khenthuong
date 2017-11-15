<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        		'is_active'	=>	1,
                'created_at'=>  Carbon::now(),
                'updated_at'=>  Carbon::now(),
        	]
        );
    }
}
