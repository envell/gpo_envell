<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed_plan extends Model {
 protected $table = 'bed_plan';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'bed_numbers_bed_plan'];
  	public $timestamps = false;
	//
    
        public function bed_profile()
    {
        return $this->hasMany('App\bed_plan', 'id', 'bed_plan_id');
    }
}