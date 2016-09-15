<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Beds extends Model {
 protected $table = 'queue';
	//
    public function departments()
    {
        return $this->belongsTo('App\departments');
    }
}
