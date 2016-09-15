<?php namespace App\Http\Controllers;

use App\employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function Staff(employee $employee)
    {
        $data = employee::select(
        DB::raw("CONCAT(surname,' ', name, ' ', patronymic) AS full_name, id")
    )->orderBy('full_name')->lists('full_name', 'id');
        return view('statistics_clinic')->with('employee', $data);
    }
    
}