<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class clinic extends Model {
 protected $table = 'clinic';
	//
    public function departments()
    {
        return $this->belongsTo('App\departments', 'department_id');
    }
}