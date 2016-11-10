<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Load_plan extends Model {
 protected $table = 'load_plan';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'year_visits'];
  	public $timestamps = false;
	//
    
        public function employee_status()
    {
        return $this->belongsTo('App\employee_status', 'id', 'load_plan_id');
    }
}