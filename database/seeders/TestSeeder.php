<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tests")->delete();
        $test = [
            ["name" => "Shya",
            "ca_id"=> "dsd1"],
            ["name" => "Shya1",
            "ca_id"=> "dsd1"],
            ["name" => "Shya2",
            "ca_id"=> "dsd1"],
            ["name" => "Shya3",
            "ca_id"=> "dsd1"],
            ["name" => "Shya4",
            "ca_id"=> "dsd1"],
            ["name" => "Shya5",
            "ca_id"=> "dsd1"],
            ["name" => "Shya6",
            "ca_id"=> "dsd1"],
            ["name"=>"Shya7",
                "ca_id"=>"dsd2" ],
            ];
        DB::table("tests")->insert($test);
        //
    }
}
