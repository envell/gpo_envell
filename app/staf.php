<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model {
 protected $table = 'employee';
	//
    public function departments()
    {
        return $this->belongsTo('App\departments', 'department_id');
    }
}