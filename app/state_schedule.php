<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class State_schedule extends Model {
 protected $table = 'state_schedule';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'stake_numbers', 'employee_id', 'hospital_id'];
  	public $timestamps = false;
	//
    
    public function employee()
    {
        return $this->hasOne('App\employee', 'id', 'employee_id');
    }
    public function hospital()
    {
        return $this->hasOne('App\hospital', 'id', 'hospital_id');
    }
}