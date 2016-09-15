<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DayStationar extends Model {
 protected $table = 'day_stationar';
	//
    public function BedProfile()
    {
        return $this->hasOne('App\BedProfile', 'id', 'bed_profile_id');
    }
}
