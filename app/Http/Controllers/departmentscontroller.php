<?php namespace App\Http\Controllers;

use App\department;
use App\doctors;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class departmentscontroller extends Controller
{

    public function Departments(department $departments)
    {
         $data = department::lists('department_name', 'id');
        return view('hospital_statistics')->with('department', $data);
    }
    
     public function Departments2(department $departments)
    {
        $data = department::lists('department_name', 'id');
        return view('outpatient_statistics')->with('department', $data);
    }
    
      public function Doctors(doctors $doctors)
    {
        $doctors = department::lists('lastname', 'id');
        return view('statistics_clinic')->with('department', $doctors);
    }
}