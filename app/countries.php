<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class countries extends Model {
 protected $table = 'country';
  protected $primaryKey = 'id_country';
  	protected $fillable = ['id_country', 'country_name'];
  	public $timestamps = false;
	public function hospital()
    {
        return $this->belongsToMany('App\Hospital', 'id', 'country_id');
    }
}
