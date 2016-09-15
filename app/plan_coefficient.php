<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_coefficient extends Model {
 protected $table = 'plan_coefficient';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'bed_numbers_plan_coefficient'];
  	public $timestamps = false;
	//
    
        public function day_stationar()
    {
        return $this->hasMany('App\day_stationar', 'id', 'plan_coefficient_id');
    }
}