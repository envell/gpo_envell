<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_moonlighting extends Model {
 protected $table = 'employee_moonlighting';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'year_visits', 'moonlighting_id', 'employee_status_id'];
  	public $timestamps = false;
	//
    
    public function moonlighting()
    {
        return $this->hasOne('App\moonlighting', 'id', 'moonlighting_id');
    }
    public function employee_status()
    {
        return $this->hasOne('App\employee_status', 'id', 'employee_status_id');
    }
}
