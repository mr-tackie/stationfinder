<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController as APIController;

use App\Region;
use Auth;

class RegionController extends APIController
{
    //
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function index(){
        $regions =  Region::all();
        return $this->sendResponse($regions, 'Okay');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:regions'
        ]);

        if(Auth::user()->role != 'admin'){
            return $this->sendError('Unauthorized', [], 401);
        }

        $region = new Region;
        $region->name = $request->name;
        $region->code = $request->code;

        $region->save();
        return $this->sendResponse($region, 'Region created');
    }

    public function update(Request $request, Region $region){
        $region->name = $request->name != null ? $request->name : $region->name;

        $region->update();
        return $this->sendResponse($region, 'Region updated');
    }

    public function delete(Region $region){
        $region->delete();
        return $this->sendResponse(null, 'Region deleted');
    }

    public function show(Region $region){
        return $this->sendResponse($region, 'Okay');
    }
}
