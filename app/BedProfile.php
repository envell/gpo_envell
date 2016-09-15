<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BedProfile extends Model {
 protected $table = 'bed_profile';
	//
    public function DayStationar()
    {
        return $this->belongsTo('App\DayStationar', 'id', 'bed_profile_id');
    }
        public function Stationar()
    {
        return $this->belongsTo('App\stationar', 'id', 'bed_profile_id');
    }
        public function Norm()
    {
        return $this->hasOne('App\Norm', 'id', 'norm_id');
    }
}
