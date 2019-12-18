<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserQuery;
use App\Http\Controllers\APIController as APIController;

class UserQueryController extends APIController
{
    //
    public function getClosestStations(Request $request){
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'region' => 'required'
        ]);

        $results = UserQuery::findClosest($request->latitude, $request->longitude, $request->region);
        return $this->sendResponse(array_slice($results, 0, $request->pageLength == null ? 10 : $request->pageLenght), 'Results retrieved'); 
    }
}
