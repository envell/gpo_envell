<?php namespace App\Http\Controllers;

use App\doctors;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StafController extends Controller
{

    public function Staf(doctors $doctors)
    {
        $data = doctors::lists('lastname','lastname', 'middlename', 'id');
        return view('statistics_clinic')->with('doctors', $data);
    }
    
}