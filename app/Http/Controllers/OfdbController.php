<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfdbController extends Controller
{
    public function index(Request $request)
    {

        $url = 'https://world.openfoodfacts.org/' . ltrim($request->getRequestUri(), 'api/ofdb');

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST, $request->method());
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        curl_close($ch);
        $decodedData = json_decode($response, true);

        return response()->json($decodedData);
    }
}
