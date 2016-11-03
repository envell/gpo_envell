<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model {
 protected $table = 'position';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'position_name', 'funding_type_id', 'state_schedule_id'];
  	public $timestamps = false;
	//
        public function employee_position()
    {
        return $this->belongsTo('App\employee_position', 'id', 'position_id');
    }
        public function funding_type()
    {
        return $this->hasOne('App\funding_type', 'id', 'funding_type_id');
    }
        public function state_schedule()
    {
        return $this->hasOne('App\state_schedule', 'id', 'state_schedule_id');
    }
    
}