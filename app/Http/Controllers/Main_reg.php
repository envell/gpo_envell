<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;

class RequestController extends Controller {
    
    $hospital = new hospital;
    $country = new countries;
    $city = new cities;
    $street = new streets;
    
    $hospital_name = Request::input('hospital_name');
    $country_name = Request::input('country_name');
    $city_name = Request::input('city_name');
    $street_name = Request::input('streets_name');
    $home = Request::input('home');
    $index = Request::input('index');
    
    $hospital->hospital_name = $hospital_name;
    $hospital->home = $home;
    $hospital->index = $index;
    
    $country->country_name = $country_name;
    
    $city->city_name = $city_name;
    
    $street->street_name = $street_name;
    
    $hospital->save();
    $country->save();
    $city->save();
    $street->save();
    
    
       
}