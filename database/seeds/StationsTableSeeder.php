<?php

use Illuminate\Database\Seeder;
use app\Station;
class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wards=[
        '足立区',
        '荒川区',
        '板橋区',
        '江戸川区',
        '太田区',
        '葛飾区',
        '北区',
        '江東区',
        '品川区',
        '渋谷区',
        '新宿区',
        '杉並区',
        '墨田区',
        '世田谷区',
        '台東区',
        '千代田区',
        '中央区',
        '豊島区',
        '中野区',
        '練馬区',
        '文京区',
        '港区',
        '目黒区',
        ];

        foreach($wards as $ward){
            $station = new Station;
            $station->station_name = $ward;
            $station->save();
        }
    }
}
