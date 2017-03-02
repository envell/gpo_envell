<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_position extends Model {
 protected $table = 'employee_position';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'employee_status_id', 'position_id'];
  	public $timestamps = false;
	//
    
    public function position()
    {
        return $this->hasOne('App\position', 'id', 'position_id');
    }
    public function employee_status()
    {
        return $this->hasOne('App\employee_status', 'id', 'employee_id');
    }
}