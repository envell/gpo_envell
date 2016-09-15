<?php namespace App\Http\Controllers;
use Datatables;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DatatablesController extends Controller {

public function getIndex()
{
    return view('datatables.index');
}

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
public function anyData()
{
    return Datatables::of(User::query())->make(true);
}

}
