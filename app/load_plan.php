<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Load_plan extends Model {
 protected $table = 'load_plan';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'year_visits'];
  	public $timestamps = false;
	//
    
        public function employee()
    {
        return $this->belongsTo('App\employee', 'id', 'load_plan_id');
    }
}