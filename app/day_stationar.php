<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Day_stationar extends Model {
 protected $table = 'day_stationar';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'bed_numbers', 'bed_numbers_fact_coefficient', 
  	'day_begining', 'received', 'discharged', 'type_day_stationar', 'date_day_stationar', 'hospital_id', 'plan_coefficient'];
  	public $timestamps = false;
	//
    
    public function hospital()
    {
        return $this->hasOne('App\hospital', 'id', 'hospital_id');
    }
    public function bed_profile()
    {
        return $this->hasMany('App\bed_profile', 'id', 'day_stationar_id');
    }
    public function plan_coefficient()
    {
        return $this->hasOne('App\plan_coefficient', 'id', 'plan_coefficient_id');
    }
}