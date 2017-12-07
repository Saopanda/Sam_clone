<?php

use Illuminate\Database\Seeder;
use Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$a = [];
        for($i=0;$i<20;$i++){
        	$data['name']=str_random(10);
        	$data['pwd']=Hash::make('pwd');
        }
    }
}
