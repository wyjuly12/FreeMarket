<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $param = [
            'goods' => '腕時計' ,
            'price' => '15000' ,
            'explanation' => 'スタイリッシュなデザインのメンズ腕時計' ,
            'image' => '/images/Watch.jpg' ,  
            'condition_id' => '1' ,
            'sell_flag' => '0'              
        ];
        DB::table('items')->insert($param);
        
        $param = [
            'goods' => 'HDD' ,
            'price' => '5000' ,
            'explanation' => '高速で信頼性の高いハードディスク' ,
            'image' => '/images/HDD.jpg' ,  
            'condition_id' => '2',
            'sell_flag' => '0'              
        ];
        DB::table('items')->insert($param);

        $param = [
            'goods' => '玉ねぎ3束' ,
            'price' => '300' ,
            'explanation' => '新鮮な玉ねぎ3束のセット' ,
            'image' => '/images/Onion.jpg' ,  
            'condition_id' => '3',
            'sell_flag' => '0'              
        ];
        DB::table('items')->insert($param);

        $param = [
            'goods' => '革靴' ,
            'price' => '4000' ,
            'explanation' => 'クラシックなデザインの革靴' ,
            'image' => '/images/Shoes.jpg' ,  
            'condition_id' => '4',  
            'sell_flag' => '0'               
        ];
        DB::table('items')->insert($param);

        $param = [
            'goods' => 'ノートPC' ,
            'price' => '45000' ,
            'explanation' => '高性能なノートパソコン' ,
            'image' => '/images/LaptopPC.jpg' ,  
            'condition_id' => '1',
            'sell_flag' => '0'               
        ];
        DB::table('items')->insert($param);

        $param = [
            'goods' => 'マイク' ,
            'price' => '8000' ,
            'explanation' => '高音質のレコーディング用マイク' ,
            'image' => '/images/Mic.jpg' ,  
            'condition_id' => '2',
            'sell_flag' => '0'              
        ];
        DB::table('items')->insert($param);

        $param = [
            'goods' => 'ショルダーバッグ' ,
            'price' => '3500' ,
            'explanation' => 'おしゃれなショルダーバッグ' ,
            'image' => '/images/Bag.jpg' ,  
            'condition_id' => '3',  
            'sell_flag' => '0'             
        ];
        DB::table('items')->insert($param);

        $param = [
            'goods' => 'タンブラー' ,
            'price' => '500' ,
            'explanation' => '使いやすいタンブラー' ,
            'image' => '/images/Tumbler.jpg' ,  
            'condition_id' => '4',
            'sell_flag' => '0'                 
        ];
        DB::table('items')->insert($param);

        $param = [
            'goods' => 'コーヒーミル' ,
            'price' => '4000' ,
            'explanation' => '手動のコーヒーミル' ,
            'image' => '/images/CoffeeGrinder.jpg' ,  
            'condition_id' => '1',
            'sell_flag' => '0'              
        ];
        DB::table('items')->insert($param);

        $param = [
            'goods' => 'メイクセット' ,
            'price' => '2500' ,
            'explanation' => '便利なメイクアップセット' ,
            'image' => '/images/Cosmetics.jpg' ,  
            'condition_id' => '2',
            'sell_flag' => '0'               
        ];
        DB::table('items')->insert($param);


    }
}
