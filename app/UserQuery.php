<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Station;

class UserQuery extends Model
{
    //

    public static function findClosest($latitude, $longitude, $region){
        $stations = Station::where('region_code', $region)->get();
        $distances = array();

        $userlatitude = deg2rad($latitude);
        $userlongitude = deg2rad($longitude);

        foreach($stations as $station){
            //i will be using the haversine formula to calculate the nearest distances from the longitude and latitude
            //provided by the user

            $stationlat = deg2rad($station->latitude);
            $stationlong = deg2rad($station->longitude);

            $delta_latitude = $userlatitude - $stationlat;
            $delta_longitude = $userlongitude - $stationlong;

            $haversine_lat = (sin($delta_latitude/2))**2;
            $haversine_long = (sin($delta_longitude/2))**2;

            $distance = 2 * asin(sqrt($haversine_lat + cos($stationlat) * cos($userlatitude) * $haversine_long));
            $station->distance = $distance;
            $distances[] = $station;
        }

        usort($distances, function ($item1, $item2) {
            return $item1['distance'] <=> $item2['distance'];
        });
        return $distances;
    }

    public function findByRegion($region){
        $stations = Station::where('region_code', $region)->orderBy('name', 'ASC')->get();
        print_r($stations);
    }
}
