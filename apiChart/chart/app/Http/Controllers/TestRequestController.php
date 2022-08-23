<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestRequestController extends Controller
{
    public function index(){
        $client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer 96674d66-4151-4056-9f51-dfbc76ec24cc',
                'Content-Type' => 'application/json'
            ]
        ]);
        $data = [
            "request_url" => "/api/large/application/foods",
            "project_id" => 8094,
            "http_method" => 0,
            "is_production_mode" => "0",
            "os_name" => "dashboard_tms",
            "params" => [
                "status" => "-1",
                "is_take_away" => "-1",
                "is_addition" => "-1",
                "category_type" => "-1",
                "category_id" => "-1",
                "restaurant_brand_id" => "723",
                "branch_id" => "-1",
                "is_count_material"=>"1",
                "page"=>"1",
                "limit"=>"50000",
                "is_bestseller"=>"-1",
                "is_combo"=>"-1",
                "kitchen_id"=>"-1",
                "is_special_gift"=>"-1",
                "key_Search"=>"",
                "is_force_online" => 1]];
        $res =  $client->request('post', 'http://172.16.2.243:8092/api/queues', [
            'http_errors' => false,
            'json' => $data,
        ]);
//        dd($res);
        $config = json_decode($res->getBody(),true);
//        dd($config);
        return $config;
//        dd($config);
//        $collection = collect($config);
//        $collection->toArray();
//        return $collection;

//        dd($collection);
//        return $collection;
    }
}
