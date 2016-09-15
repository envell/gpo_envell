<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Norm extends Model {
 protected $table = 'norm';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'hospitalization_queue', 'average_treatment_duration', 'bed_occupation'];
  	public $timestamps = false;
	//
    
        public function bed_pofile()
    {
        return $this->hasMany('App\bed_pofile', 'id', 'norm_id');
    }
}