<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Beds extends Model {
 protected $table = 'beds';
	//
    public function departments()
    {
        return $this->hasOne('App\departments', 'id', 'department_id');
    }
}
