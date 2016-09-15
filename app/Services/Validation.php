<?php namespace app\Services;
use Hash;
use Auth;
use Illuminate\Validation\Validator;

class Validation extends Validator {

    public function validateOldPass($attribute, $value, $parameters)
    {
        return Hash::check( $value, Auth::user()->password );
    }
    
} 