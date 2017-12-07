<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = [];
        for($i=0;$i<40;$i++){
        	$data['title']=str_random(10);
        	$data['price']=str_random(3);
        	$data['content']=str_random(1);
        	$data['addtime']=date('y-m-d h:i:s');
        	
        }
    }
}
