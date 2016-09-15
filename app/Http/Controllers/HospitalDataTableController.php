<?php namespace App\Http\Controllers;

use App\DataTables\HospitalDataTable;
use App\Http\Requests;

class HospitalDataTableController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index(HospitalDataTable $dataTable)
    {
        return $dataTable->render('tables.hospital_table');
    }
}