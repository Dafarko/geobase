<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        return view('city.cities');
    }

    public function getCities(Request $request){
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/city/'.$request->name);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $data = ['cityInfo' => $jsonData -> result,
                 'lat' => $jsonData -> result -> Lat,
                 'lng' => $jsonData -> result -> Lng];
        return view('city.city-video', $data);
    }

    public function tableSearch(){
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/cities');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        return Response($jsonData -> result);
    }
}
