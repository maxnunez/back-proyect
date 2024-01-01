<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function search(Request $request){
       $url = env('API_URL_VIDEOS');
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => env('KEY_API'),
            'X-RapidAPI-Host' => 'youtube-v31.p.rapidapi.com'
        ])->get($url.'/search', [
            'q'=> $request->paramSearch,
            'part'=> 'snippet,id',
            'maxResults' => '10',
            'order' => 'date'
        ]);
        return $response;
    }
    public function showDetailVideo (Request $request){
       $url = env('API_URL_VIDEOS');
       $detailVideo = Http::withHeaders([
            'X-RapidAPI-Key' => env('KEY_API'),
            'X-RapidAPI-Host' => 'youtube-v31.p.rapidapi.com'
        ])->get($url.'/showVideo', [
            'part' => 'contentDetails,snippet,statistics',
            'id' => $request->videoId
        ]);
        return $detailVideo;
    }

}
