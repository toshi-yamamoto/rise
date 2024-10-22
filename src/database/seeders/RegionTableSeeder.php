<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '東京'
        ];
        DB::table('regions')->insert($param);

        $param = [
            'name' => '大阪'
        ];
        DB::table('regions')->insert($param);

        $param = [
            'name' => '福岡'
        ];
        DB::table('regions')->insert($param);
    }
}
