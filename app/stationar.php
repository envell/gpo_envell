<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationar extends Model {
 protected $table = 'stationar';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'bed_numbers_fact', 'day_begining', 'wait_7', 'wait_8_14',
  	'wait_15_30', 'wait_30', 'died', 'received_stationar', 'discharged_stationar', 'date_stationar', 
  	'hospital_id', 'plan_id'];
  	public $timestamps = false;
	//
    
    public function hospital()
    {
        return $this->hasOne('App\hospital', 'id', 'hospital_id');
    }
     public function bed_profile()
    {
        return $this->hasOne('App\bed_profile', 'id', 'stationar_id');
    }
     public function Plan()
    {
        return $this->hasOne('App\plan', 'id', 'plan_id');
    }
}