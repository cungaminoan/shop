<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("details")->delete();
        $details = [
            [
                "user_id" => 19,
                "profile" => "nguoi tung trai 1",],
            [
                "user_id" => 20,
                "profile" => "nguoi tung trai 2",],
            [
                "user_id" => 21,
                "profile" => "nguoi tung trai 3",],
            [
                "user_id" => 22,
                "profile" => "nguoi tung trai 4",],
            [
                "user_id" => 23,
                "profile" => "nguoi tung trai 5",],
            [
                "user_id" => 24,
                "profile" => "nguoi tung trai 6",]
        ];
        DB::table("details")->insert($details);
    }
}
