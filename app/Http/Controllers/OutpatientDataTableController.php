<?php namespace App\Http\Controllers;

use App\DataTables\OutpatientDataTable;
use App\Http\Requests;

class OutpatientDataTableController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index(OutpatientDataTable $dataTable)
    {
        return $dataTable->render('tables.outpatient_table');
    }
}