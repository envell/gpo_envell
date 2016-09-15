<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class cities extends Model {
 protected $table = 'city';
  protected $primaryKey = 'id_city';
  	protected $fillable = ['id_city', 'city_name'];
  	public $timestamps = false;
	public function hospital()
    {
        return $this->belongsToMany('App\Hospital', 'id', 'city_id');
    }
}
