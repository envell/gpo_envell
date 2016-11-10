<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model {
 protected $table = 'employee';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'name', 'surname', 'patronymic', 'employee_status_id'];
  	protected $appends = ['full_name'];
  	public $timestamps = false;
	//
    
    public function getFullNameAttribute()
    {
    $full_name = $this->surname.' '.$this->name.' '.$this->patronymic;
    }

    public function employee_status()
    {
        return $this->hasMany('App\employee_status', 'id', 'employee_status_id');
    }
}
