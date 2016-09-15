<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Norm extends Model {
 protected $table = 'norm';
	//
    public function BedProfile()
    {
        return $this->belongsTo('App\BedProfile', 'id', 'day_stationar_id');
    }
}
