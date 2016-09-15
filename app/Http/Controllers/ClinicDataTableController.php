<?php namespace App\Http\Controllers;

use App\DataTables\ClinicDataTable;
use App\Http\Requests;

class ClinicDataTableController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index(ClinicDataTable $dataTable)
    {
        return $dataTable->render('tables.clinic_table');
    }
}