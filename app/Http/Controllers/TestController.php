<?php namespace App\Http\Controllers;
use App\employee;
use App\employee_position;
use App\employee_moonlighting;
use App\position;
use App\visit_numbers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\BedProfile;


class TestController extends Controller
{

    public function test()
    {
$collection = collect([]);
$start_date = "2016-07-01";
$end_date = "2116-07-01";
$days = 2;
$employees = employee::get();
$positions = position::get();
$position_name=NULL;
foreach ($positions as $position)
{


echo $position->state_schedule->stake_numbers;
}
    
}
}