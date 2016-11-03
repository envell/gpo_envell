<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class visit_numbers extends Model {
 protected $table = 'visit_numbers';
    protected $primaryKey = 'id';
  	protected $fillable = ['id', 'category_name', 'hospital_disease', 
  	'hospital_profilactic', 'home_disease', 'home_profilactic', 'payment_paid', 
  	'payment_omc', 'payment_budget', 'date_visit_numbers', 'employee_id', 'hospital_id'];
  	public $timestamps = false;
	//
    
    public function employee()
    {
        return $this->belongsTo('App\employee', 'id', 'employee_id');
    }
    public function hospital()
    {
        return $this->hasOne('App\hospital', 'id', 'hospital_id');
    }
}