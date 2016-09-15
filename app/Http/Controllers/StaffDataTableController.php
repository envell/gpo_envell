<?php namespace App\Http\Controllers;

use App\DataTables\StaffDataTable;
use App\Http\Requests;

class StaffDataTableController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index(StaffDataTable $dataTable)
    {
        return $dataTable->render('tables.staff_table');
    }
}