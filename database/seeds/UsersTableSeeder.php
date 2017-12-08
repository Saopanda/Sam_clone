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
    	$a = [];
        for($i=0;$i<20;$i++){
        	$data['name']=str_random(10);
        	$data['pwd']=Hash::make('passwd');
            $data['ztid']='1';
            $data['email']=str_random(5).'@gmail.com';
            $data['phone']='130'.rand(10000000,99999999);
            $a[]=$data;
        }
        DB::table('user')->insert($a);
    }
}
