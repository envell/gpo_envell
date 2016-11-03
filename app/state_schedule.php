<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class state_schedule extends Model {
 protected $table = 'state_schedule';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'stake_numbers', 'hospital_id'];
  	public $timestamps = false;
	//
    
    public function position()
    {
        return $this->belongsTo('App\position', 'id', 'state_schedule_id');
    }
    public function hospital()
    {
        return $this->hasOne('App\hospital', 'id', 'hospital_id');
    }
}