<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model {
 protected $table = 'unit';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'hospital_id', 'id_country', 'unit_name'];
  	public $timestamps = false;
	//
    
        public function hospital()
    {
        return $this->hasOne('App\hospital', 'id', 'hospital_id');
    }
}