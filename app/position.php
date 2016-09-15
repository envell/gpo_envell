<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {
 protected $table = 'position';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'position_name', 'funding_type_id'];
  	public $timestamps = false;
	//
    
        public function funding_type()
    {
        return $this->hasOne('App\funding_type', 'id', 'funding_type_id');
    }
}