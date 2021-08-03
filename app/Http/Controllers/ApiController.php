<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getFromApi($api_name, Request $req)
    {   
        // dd(json_encode($req->all()));
        // dd($api_name, $req->all());
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://10.14.17.213:8300/api/'.$api_name,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($req->all()),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $data     = '';
        $response = curl_exec($curl);
        $response = json_decode($response);
        if(isset($response->statusCode) == 202){
            $data = $response->data;
        }
        curl_close($curl);
        return $data;
    }

    public function test($api_name)
    {
        $data = [
            "data" => [
            [
              "x"=> '20 Jul',
              "y" => random_int(100, 999)
            ],
            [
              "x"=> '21 Jul',
              "y" => random_int(100, 999)
            ],
            [
              "x"=> '22 Jul',
              "y" => random_int(100, 999)
              ],
            [
              "x"=> '23 Jul',
              "y" => random_int(100, 999)
            ],
            [
              "x"=> '20 Jul',
              "y" => random_int(100, 999)
            ],
            [
              "x"=> '21 Jul',
              "y" => random_int(100, 999)
            ],
            [
              "x"=> '22 Jul',
              "y" => random_int(100, 999)
              ],
            [
              "x"=> '23 Jul',
              "y" => random_int(100, 999)
            ],
            [
              "x"=> '20 Jul',
              "y" => random_int(100, 999)
            ],
            [
              "x"=> '21 Jul',
              "y" => random_int(100, 999)
            ],
            [
              "x"=> '22 Jul',
              "y" => random_int(100, 999)
              ],
            [
              "x"=> '23 Jul',
              "y" => random_int(100, 999)
            ],
          ]
        ];
        // dd($data);
        return $data;
    }
}
