<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class ImgApiController extends Controller
{
    public static function api($file){


            
        $client = new Client();
    
        $res = $client->request('POST', 'https://freeimage.host/api/1/upload', [
          'form_params' => [
          'key' => config('services.IMG.key'),
          'action' => 'upload',
          'source' => $file,
          'format' => 'json'
    
            ]
    
        ]);
       
        $json = json_decode($res->getBody()->getContents());
        return $json;
    
        }
}
