<?php namespace App\Http\Controllers;
use App\employee;
use App\employee_position;
use App\employee_moonlighting;
use App\employee_status;
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
$employee_statuses = employee_status::get();
$positions = position::get();
$position_name=NULL;
foreach ($employee_statuses as $employee_status)
{


echo $stake_numbers_fact = $employee_status->employee;
}
    
}
}