<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Show the form the create a new blog post.
     *
     * @return Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    $rules = array(
        'bed_numbers_facts'             => 'required',                        // just a normal required validation
        'composed_at_beginning'            => 'required',     // required and must be unique in the ducks table
        'written_out'         => 'required',
        'died' => 'required'           // required and has to match the password field
    );
      $validator = Validator::make(Input::all(), $rules);
    }
}