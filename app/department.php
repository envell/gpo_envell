<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {
 protected $table = 'department';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'department_name', 'hospital_id'];
  	public $timestamps = false;
	//
    
    public function hospital()
    {
        return $this->hasOne('App\hospital', 'id', 'hospital_id');
    }
     public function bed_profile()
    {
        return $this->hasMany('App\bed_profile', 'id', 'department_id');
    }
}
