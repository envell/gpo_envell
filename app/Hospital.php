<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model {
 protected $table = 'hospital';
    protected $primaryKey = 'id_hospital';
  	protected $fillable = ['id_hospital', 'id_street', 'id_country', 'id_city', 'hospital_name', 'home', 'index', 
  'streets', 'cities', 'countries'];
  protected $appends = ['full_name'];
  	public $timestamps = false;
	//
   public function getFullAdressAttribute()
{   if(!$this->countries or !$this->cities or !$this->streets)
{    
    return NULL;
}
    else
    return $this->countries->country_name.', '.$this->cities->city_name.', '.$this->streets->street_name.', '.$this->home;
}

    public function setCountriesAttribute($values)
{
    $country_name = countries::updateorcreate($values);
    $this->id_country = $country_name->id_country;  
    $country_name->save();
}

    public function setCitiesAttribute($values)
{
    $city_name = cities::updateorcreate($values);
    $this->id_city = $city_name->id_city;  
    $city_name->save();
}

    public function setStreetsAttribute($values)
{
    $street_name = streets::updateorcreate($values);
    $this->id_street = $street_name->id_street;  
    $street_name->save();
}

        public function countries()
    {
        return $this->hasOne('App\countries', 'id', 'contry_id');
    }
    
        public function cities()
    {
        return $this->hasOne('App\cities', 'id', 'city_id');
    }
    
        public function streets()
    {
        return $this->hasOne('App\streets', 'id', 'street_id');
    }
    
        public function units()
    {
        return $this->hasMany('App\unit', 'id', 'hospital_id');
    }
    
    public function departments()
    {
        return $this->hasMany('App\department', 'id', 'hospital_id');
    }
    public function state_schedule()
    {
        return $this->hasMany('App\state_schedule', 'id', 'hospital_id');
    }
    public function employee_status()
    {
        return $this->hasMany('App\employee_status', 'id', 'hospital_id');
    }
    public function visit_numbers()
    {
        return $this->hasMany('App\visit_numbers', 'id', 'hospital_id');
    }
    public function stationar()
    {
        return $this->hasMany('App\stationar', 'id', 'hospital_id');
    }
    public function day_stationar()
    {
        return $this->hasMany('App\day_stationar', 'id', 'hospital_id');
    }
}