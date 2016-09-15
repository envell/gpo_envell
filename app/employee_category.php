<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_category extends Model {
 protected $table = 'employee_category';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'category_name', 'employee_id', 'hospital_id'];
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
