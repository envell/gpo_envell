<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class streets extends Model {
 protected $table = 'street';
  protected $primaryKey = 'id_street';
  	protected $fillable = ['id_street', 'street_name'];
  	public $timestamps = false;
	public function hospital()
    {
        return $this->belongsToMany('App\Hospital', 'id', 'street_id');
    }
}
