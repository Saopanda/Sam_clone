<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	$a = [];
        for($i=0;$i<20;$i++){
            $data['shengri']=date('y-m-d');
        	$data['touimg']=$faker->imageUrl(40,40);
            $a[]=$data;
        }
        DB::table('userinfo')->insert($a);

        // $a = [];
        // for($i=0;$i<20;$i++){
        //     $data['name']=str_random(10);
        //     $data['sta']=str_random(18);
        //     $data['pwd']=Hash::make('passwd');
        //     $data['ztid']='1';
        //     $data['email']=str_random(5).'@gmail.com';
        //     $data['phone']='130'.rand(10000000,99999999);
        //     $a[]=$data;
        // }
        // DB::table('user')->insert($a);
    }
}
