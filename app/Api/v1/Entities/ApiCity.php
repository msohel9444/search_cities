<?php

namespace App\API\v1\Entities;

use App\City;
use Illuminate\Http\Request;

class ApiCity{

    public function searchCities(Request $request){
        try{
            $keyword = $request->get('keyword');

            $city_query = City::query();

            if(!empty($keyword)){
                $city_query->where('name', 'LIKE', "$keyword%")->select('name');

                $cities = $city_query->get();

                $data = [];
                foreach($cities as $city){
                    array_push($data, $city->name);
                }


                return  response([
                    'results' => $data
                ], 200);
            }

            return  response([
                'error' => 'please enter a keyword to search the city'
            ], 404);


        }catch (\Exception $e){
            return response([
              'error' => 'something went wrong, please try again later!'
            ], 500);
        }
    }
}