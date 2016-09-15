<?php namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests;

class UserDataTableController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users');
    }
}