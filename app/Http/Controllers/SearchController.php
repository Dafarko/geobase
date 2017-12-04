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
        if ($request->pfrom != "") {
            curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/search/' . $request->pfrom . '/' . $request->pto);
        } else {
            curl_setopt($curlSession, CURLOPT_URL, 'http://localhost:9000/search-code/' . $request->code);
        }
            curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

            $jsonParams = json_decode(curl_exec($curlSession));
            curl_close($curlSession);


        $data = ['countryInfo' => $jsonParams -> result];

        return view('search.search-result', $data);
    }
}
