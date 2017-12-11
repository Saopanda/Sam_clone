<?php

use Illuminate\Database\Seeder;

class PinglunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = [];
        for($i=0;$i<100;$i++){
            $data['userid']=rand(1,30);
            $data['goodsid']=rand(1,99);
        	$data['price']=rand(10000,99999);
        	$data['content']=str_random(100);
        	$data['addtime']=date('y-m-d h:i:s');
        	$a[] = $data;
        }
        DB::table('goods')->insert($a);

        // $a = [];
        // for($i=0;$i<100;$i++){
        //     $data['userid']=rand(1,30);
        // 	$data['img_url']=$faker->imageUrl(50,50);
        // 	$a[] = $data;
        // }
        // DB::table('pl_img')->insert($a);
    }
}
