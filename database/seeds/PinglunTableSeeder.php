<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PinglunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $a = [];
        // for($i=0;$i<100;$i++){
        //     $data['userid']=rand(1,30);
        //     $data['goodsid']=rand(1,99);
        // 	$data['price']=rand(10000,99999);
        // 	$data['content']=str_random(100);
        // 	$data['addtime']=date('y-m-d h:i:s');
        // 	$a[] = $data;
        // }
        // DB::table('goods')->insert($a);

        // $a = [];
        // for($i=0;$i<100;$i++){
        //     $data['userid']=rand(1,40);
        //     $data['img_url']=$faker->imageUrl(50,50);
        //     $data['plid']=$i+1;
        //     $a[] = $data;
        // }
        // DB::table('pl_img')->insert($a);



 $a = [];
        for($i=0;$i<100;$i++){
            $data['userid']=rand(1,40);
            $data['goodsid']=rand(1,88);
            $data['content']='#榴莲千层蛋糕# 性价比最高的榴莲蛋糕！感谢@艾爾蘭酒咖啡赛高 来投喂我！想到以前吃的那些死贵的千层就伐开心！购于深圳山姆会员店：这么大个榴莲千层才99.8RMB，榴莲肉超多，好吃到哭泣';
            $data['ztid']=rand(1,3);
            $data['time']=date('y-m-d h:i:s');
            $data['shenghe']=rand(1,2);
        	$a[] = $data;
        }
        DB::table('pinglun')->insert($a);









    }
}
