<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;


class CountryController extends Controller
{
    public function index(){
        return view('country.countries');
    }

    public function getCountry(Request $request){

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/country/'.$request->name_en);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $row[] = '';
        foreach ($jsonData -> result as $key => $result){
            $row[] = $result;
        }

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://api.geonames.org/countryInfoJSON?formatted=true&lang=en&country='.$row[2].'&username=romaha&style=full');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonGeo = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $row_geo[] = '';
        foreach ($jsonGeo -> geonames as $key => $geonames){
            $row_geo[] = $geonames;
        }

        $population = $row_geo[1]->population;
        $area = $row_geo[1]->areaInSqKm;

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?address='.$request->name_en.'&key=AIzaSyAQSIzUItqXEdUbpBvp9TUBCMHZLuWU6oI');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonGoogle = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $row_google[] = '';
        foreach ($jsonGoogle -> results as $key => $google){
            $row_google[] = $google;
        }

        $lat = $row_google[1]->geometry->location->lat;
        $lng = $row_google[1]->geometry->location->lng;

        $data = ['countryInfo' => $jsonData -> result,
                 'population' => $population,
                 'area' => $area,
                 'lat' => $lat,
                 'lng' => $lng];
        return $data;
    }

    public function getAllCountry(){

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/countries');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $row[] = '';
        foreach ($jsonData -> result as $key => $result){
            $row[] = $result;
        }

        $data = ['countryInfo' => $row];
        return view('country.country-all', $data);
    }

    public function tableSearch(){

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/countries');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        return Response($jsonData -> result);
    }
}
