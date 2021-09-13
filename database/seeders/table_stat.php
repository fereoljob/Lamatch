<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class table_stat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("stats")->insert([
            [
                "infos_stat"=>"informations_stat",
                "matchings"=>0,
                "recrutements"=>0

            ]
        ]);
    }
}
