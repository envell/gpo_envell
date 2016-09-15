<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Funding_type extends Model {
 protected $table = 'funding_type';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'oms', 'budget', 'paid'];
  	public $timestamps = false;
	//
    
        public function position()
    {
        return $this->hasMany('App\position', 'id', 'funding_type_id');
    }
}