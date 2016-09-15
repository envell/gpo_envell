<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class doctors extends Model {
 protected $table = 'staff';
	public function staff()
    {
        return $this->hasMany('App\staff');
    }

}
