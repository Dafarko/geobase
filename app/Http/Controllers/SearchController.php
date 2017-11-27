<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('search.search');
    }

    public function getSearch(Request $request)
    {

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/countries');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonParams = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        $row[] = '';
        for ($i = 0; $i < count($jsonParams->result); $i++){
            $curlSession = curl_init();
            curl_setopt($curlSession, CURLOPT_URL, 'http://api.geonames.org/countryInfoJSON?formatted=true&lang=en&countryCode=' . $jsonParams->result[$i]->CountryCode . '&username=romaha&style=full');
            curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

            $jsonGeo = json_decode(curl_exec($curlSession));
            curl_close($curlSession);
            if ((($jsonGeo->geonames[$i]->population) > ($request->pfrom)) && (($jsonGeo->geonames[$i]->population) < ($request->pto)))
                $row[] = $jsonParams -> result[$i] -> CountryName;
        }

        $data = ['countryInfo' => $row -> CountryName];

        return view('search.search-result', $data);
    }
}
