<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed_profile extends Model {
 protected $table = 'bed_profile';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'bed_name', 'department_id', 'norm_id', 'bed_plan_id', 'stationar_id', 'day_stationr_id'];
  	public $timestamps = false;
	//
    
    public function stationar()
    {
        return $this->hasOne('App\stationar', 'id', 'stationar_id');
    }
    public function day_stationr()
    {
        return $this->hasOne('App\day_stationr', 'id', 'day_stationr_id');
    }
    public function norm()
    {
        return $this->hasOne('App\norm', 'id', 'norm_id');
    }
    public function bed_plan()
    {
        return $this->hasOne('App\bed_plan', 'id', 'bed_plan_id');
    }
    public function department()
    {
        return $this->hasOne('App\department', 'id', 'department_id');
    }
}