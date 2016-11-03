<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model {
 protected $table = 'employee';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'name', 'surname', 'patronymic', 'decree', 'hospital_id', 'unit_id', 'load_plan_id'];
  	protected $appends = ['full_name'];
  	public $timestamps = false;
	//
    
    public function getFullNameAttribute()
    {
    $full_name = $this->surname.' '.$this->name.' '.$this->patronymic;
    }
    public function state_schedule()
    {
        return $this->hasMany('App\state_schedule', 'id', 'employee_id');
    }
     public function employee_position()
    {
        return $this->hasMany('App\employee_position', 'id', 'employee_id');
    }
     public function employee_moonlighting()
    {
        return $this->hasMany('App\employee_moonlighting', 'id', 'employee_id');
    }
     public function visit_numbers()
    {
        return $this->hasMany('App\visit_numbers', 'employee_id', 'id');
    }
     public function employee_category()
    {
        return $this->hasMany('App\employee_category', 'id', 'employee_id');
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
