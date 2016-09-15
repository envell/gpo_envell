<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;
use Excel;
use App\Http\Requests\StatisticsRequest;
use App\Http\Requests\OutpatientRequest;
use App\Http\Requests\PoliclinicaRequest;
use App\Http\Requests\StaffRequest;
use App\Http\Requests\StafRequest;
use App\Http\Requests\RegorgRequest;
use Carbon\Carbon;

class RequestController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
     
      public function postUpload ($file)
{
Excel::selectSheetsByIndex(0)->load($file, function($reader) {
$i=0;
$rows = $reader->all();
            foreach ($rows as $row) {
				foreach($row as $mas[$i])
					{	
				
					echo ' '.$mas[$i];
					$i++;
					
					}
					echo $row;
                //echo $row->id.' '.$row->treated_patients.' '.$row->held_beddays."<br />";
				DB::table('beds')->insertGetId(array(
											
												 'bed_numbers_facts' => $mas[$i-5], 
												 'composed_at_beginning' => $mas[$i-4],
												 'written_out' => $mas[$i-3],
												 'died' => $mas[$i-2],
												
												 
												));			
					
				}
		;
			

});
}
     
    public function  stationar_add(StatisticsRequest $request)
    {
    	if (Request::hasfile('file'))
    	{

$file = Request::file('file');
     app('App\Http\Controllers\RequestController')->postUpload($file);
    	}
    	else
    	{
    		
      $input = Request::all();
      $id = Request::input('id');
	  $bed_numbers_facts = Request::input('bed_numbers_facts');
	  $composed_at_beginning = Request::input('composed_at_beginning');
	  $received = Request::input('received');
	  $written_out = Request::input('written_out');
	  $died = Request::input('died');
	  $date = Carbon::today();
	  $plan = Request::input('plan');
	  $wait_up_to_7_days = Request::input('wait_up_to_7_days');
	  $wait_8_14_days = Request::input('wait_8_14_days');
	  $wait_15_30_days = Request::input('wait_15_30_days');
	  $wait_more_than_30_days = Request::input('wait_more_than_30_days');
	  $held_beddays = Request::input('held_beddays');
	  DB::table('beds')->insert([
	  							'bed_numbers_facts' => $bed_numbers_facts, 
								'composed_at_beginning' => $composed_at_beginning,
								'received' => $received,
								'written_out' => $written_out,
								'died' => $died,
								'department_id' => $id,
								'date' => $date,
								]
);
	  DB::table('queue')->insert([
	  							'plan' => $plan, 
								'wait_up_to_7_days' => $wait_up_to_7_days,
								'wait_8_14_days' => $wait_8_14_days,
								'wait_15_30_days' => $wait_15_30_days,
								'wait_more_than_30_days' => $wait_more_than_30_days,
								'department_id' => $id,
								]
);
	  DB::table('values')->insert([
	  							'held_beddays' => $held_beddays, 
								]
);
 
  }
return redirect()->back()->withinput();
    	}
    	
     public function  outpatient_add(OutpatientRequest $request)
    {
    	if (Request::hasfile('file'))
    	{

$file = Request::file('file');
     app('App\Http\Controllers\RequestController')->postUpload($file);
    	}
    	else
    	{
    		
      $input = Request::all();
      $id = Request::input('id');
	  $bed_numbers_facts = Request::input('bed_numbers_facts');
	  $composed_at_beginning = Request::input('composed_at_beginning');
	  $received = Request::input('received');
	  $written_out = Request::input('written_out');
	  $died = Request::input('died');
	  $date = Carbon::today();
	  $plan = Request::input('plan');
	 //$wait_up_to_7_days = Request::input('wait_up_to_7_days');
	 //$wait_8_14_days = Request::input('wait_8_14_days');
	 //$wait_15_30_days = Request::input('wait_15_30_days');
	 // $wait_more_than_30_days = Request::input('wait_more_than_30_days');
	  DB::table('beds')->insert([
	  							'bed_numbers_facts' => $bed_numbers_facts, 
								'composed_at_beginning' => $composed_at_beginning,
								'received' => $received,
								'written_out' => $written_out,
								'died' => $died,
								'department_id' => $id,
								'date' => $date,
								]
);

 
  }
return redirect()->back()->withinput();
    	}
    	
    	public function clinic_add(PoliclinicaRequest $request)
    {
    	if (Request::hasfile('file'))
    	{

$file = Request::file('file');
     app('App\Http\Controllers\RequestController')->postUpload($file);
    	}
    	else
    	{
    		
      $input = Request::all();
      $id = Request::input('id');
	  $all = Request::input('all');
	  $disease = Request::input('disease');
	  $preventive = Request::input('preventive');
	  $OMC = Request::input('OMC');
	 //$date = Carbon::today();
	  $budget = Request::input('budget');
	  $paid = Request::input('paid');
	 //$wait_up_to_7_days = Request::input('wait_up_to_7_days');
	 //$wait_8_14_days = Request::input('wait_8_14_days');
	 //$wait_15_30_days = Request::input('wait_15_30_days');
	 // $wait_more_than_30_days = Request::input('wait_more_than_30_days');
	  DB::table('home_visits')->insert([
	  							'all' => $all, 
								'disease' => $disease,
								'preventive' => $preventive,
								]
);
	  DB::table('clinic_visits')->insert([
								'all' => $all, 
								'disease' => $disease,
								'preventive' => $preventive,
								]
);
	  DB::table('visits_types_payment')->insert([
								'OMC' => $OMC, 
								'budget' => $budget,
								'paid' => $paid,
								]
);

 
  }
return redirect()->back()->withinput();
    	}
    	
    	public function  staff_add(StaffRequest $request)
    {
    	if (Request::hasfile('file'))
    	{

$file = Request::file('file');
     app('App\Http\Controllers\RequestController')->postUpload($file);
    	}
    	else
    	{
    		
      $input = Request::all();
      $id = Request::input('id');
	  $post= Request::input('post');
	  $staff_number_id = Request::input('staff_number_id');
	  DB::table('posts')->insert([
	  							'post' => $post,
								]);
	  DB::table('posts')->insert([
	  							'staff_number_id' => $staff_number_id,
								]);							
 
  }
return redirect()->back()->withinput();
    	}
    	
    	public function  staf_add(StafRequest $request)
    {
    	if (Request::hasfile('file'))
    	{

$file = Request::file('file');
     app('App\Http\Controllers\RequestController')->postUpload($file);
    	}
    	else
    	{
    		
      $input = Request::all();
      $id = Request::input('id');
	  $lastname = Request::input('lastname');
	  $firstname = Request::input('firstname');
	  $middlename = Request::input('middlename');
	  $post_id = Request::input('post');
	  $rates_fact = Request::input('rates_fact');
	  DB::table('staff')->insert([
								'lastname' => $lastname,
								'firstname' => $firstname,
								'middlename' => $middlename,
								'post' => $post,
							
								]);
//	  DB::table('posts')->insert([
//								'post' => $post,
//								]);							
	  DB::table('rates_fact')->insert([
									'rates_fact' => $rates_fact,
								]);


 
  }
return redirect()->back()->withinput();
    	}
    	
    	public function  regorg_add(RegorgRequest $request)
    {
    	if (Request::hasfile('file'))
    	{

$file = Request::file('file');
     app('App\Http\Controllers\RequestController')->postUpload($file);
    	}
    	else
    	{
    		
      $input = Request::all();
      $id = Request::input('id');
	  $hospital_name = Request::input('hospital_name');
	  $country_name = Request::input('country_name');
	  $city_name = Request::input('city_name');
	  $street_name = Request::input('street_name');
	  $home = Request::input('home');
	  $index = Request::input('index');
	  
	  DB::table('hospital')->insert([
	  							'hospital_name' => $hospital_name, 
								'home' => $home,
								'index' => $index,
								]);
	  
	  DB::table('country')->insert([
									'country_name' => $country_name,
								]);
	  
	  DB::table('city')->insert([
									'city_name' => $city_name,
								]);
	  
	  DB::table('street')->insert([
									'street_name' => $street_name,
								]);
  }
return redirect()->back()->withinput();
    	}
//        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
	