<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $file_path = public_path().'/json/cities.json';

            $cities = json_decode(File::get($file_path));
            foreach($cities as $city){
                \Illuminate\Support\Facades\DB::table('cities')->insert([
                   'name' => $city->name,
                   'state' => $city->state
                ]);
            }

    }
}
