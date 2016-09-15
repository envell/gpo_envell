<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {
 protected $table = 'plan';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'patients_treated', 'average_treatment', 'bed_days_held'];
  	public $timestamps = false;
	//
    
        public function Stationar()
    {
        return $this->belongsTo('App\stationar', 'id', 'plan_id');
    }
}