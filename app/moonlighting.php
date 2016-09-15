<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Moonlighting extends Model {
 protected $table = 'moonlighting';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'moonlighting_name'];
  	public $timestamps = false;
	//
    
        public function employee_moonlighting()
    {
        return $this->hasMany('App\employee_moonlighting', 'id', 'moonlighting_id');
    }
}
