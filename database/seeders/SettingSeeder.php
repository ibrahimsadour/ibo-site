<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([

            [
                "key"=>"app",
                "name"=>"locale",
                "value"=>"ar",
                "description"=>"Here the (local language of the app) is dynamically edit",
                "active"=>"1",
                "created_at"=>Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at"=>Carbon::now()->format('Y-m-d H:i:s')
            ]
            
        ]);
    }
}
