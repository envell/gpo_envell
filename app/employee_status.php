<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_status extends Model {
 protected $table = 'employee_status';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'decree', 'stake_numbers_fact', 'hospital_id', 'unit_id', 'load_plan_id', 'employee_category_id',];
  	public $timestamps = false;

    
    public function employee()
    {
        return $this->hasOne('App\employee', 'id', 'employee_id');
    }
    public function state_schedule()
    {
        return $this->hasMany('App\state_schedule', 'id', 'employee_status_id');
    }
     public function employee_position()
    {
        return $this->hasMany('App\employee_position', 'id', 'employee_status_id');
    }
     public function employee_moonlighting()
    {
        return $this->hasMany('App\employee_moonlighting', 'id', 'employee_status_id');
    }
     public function visit_numbers()
    {
        return $this->hasMany('App\visit_numbers', 'employee_status_id', 'id');
    }
     public function employee_category()
    {
        return $this->hasMany('App\employee_category', 'id', 'employee_status_id');
    }
     public function hospital()
    {
        return $this->hasOne('App\hospital', 'id', 'hospital_id');
    }
    public function unit()
    {
        return $this->hasOne('App\unit', 'id', 'unit_id');
    }
    public function load_plan()
    {
        return $this->hasOne('App\load_plan', 'id', 'load_plan_id');
    }
}
















