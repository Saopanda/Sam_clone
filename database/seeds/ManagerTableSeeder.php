<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data=[];
        for($i=0;$i<100;$i++){
        	$d=[];
        	$d['name']=str_random(10);
        	$d['pwd']=Hash::make('123456');
        	$data[]=$d;
        }
        DB::table('manager')->insert($data);
    }
}
