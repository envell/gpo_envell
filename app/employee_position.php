<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_position extends Model {
 protected $table = 'empoyee_position';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'employee_id', 'position_id'];
  	public $timestamps = false;
	//
    
    public function position()
    {
        return $this->hasOne('App\position', 'id', 'position_id');
    }
    public function employee()
    {
        return $this->hasOne('App\employee', 'id', 'employee_id');
    }
}