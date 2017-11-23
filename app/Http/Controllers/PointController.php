<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index(){
        return view('point.point');
    }

    public function getNearby(Request $request){
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/city/'.$request->name);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonCountry = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://api.geonames.org/findNearbyJSON?lat='.$jsonCountry -> result -> Lat.'&lng='.$jsonCountry -> result -> Lng.'&maxRows='.$request -> rows.'&radius='.$request -> radius.'&username=romaha');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $data = ['infoPlace' => $jsonData -> geonames];

        return view('point.point-result', $data);
    }

}
