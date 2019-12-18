<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController as APIController;

use App\Station;

class StationController extends APIController
{

    public function __construct(){
        $this->middleware('auth:api');
    }

    //
    public function show(Station $station){
        $this->sendResponse($station, '');
    }

    
    public function index(){
        $stations = Station::all();
        return $this->sendResponse($stations, 'Okay');   
    }

    //
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'contact_number' => 'required',
            'region_code' => 'required',
            'longitude' => 'required',
            'latitude' => 'required'
        ]);

        $station = Station::create($request->all());
        $station->save();

        return $this->sendResponse($station, 'Station added');
    }

    public function update(Request $request, Station $station){
        $station->update($request->all());
        return $this->sendResponse($station, 'Station updated');
    }

    public function delete(Station $station){
        $station->delete();
        return $this->sendResponse(null, 'Station deleted');
    }
}
