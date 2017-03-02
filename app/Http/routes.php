<?php
use App\Beds;
use App\Hospital;
use App\departments;
use App\staff;
use App\day_stationar;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('test', ['middleware' => ['auth'], 'uses' => 'TestController@test']);
Route::get('home', ['middleware' => ['auth'], 'uses' => 'departmentscontroller@Departments']);
Route::get('hospital_statistics', ['middleware' => ['auth'], 'uses' => 'departmentscontroller@Departments']);
Route::get('outpatient_statistics', ['middleware' => 'auth', 'uses' => 'departmentscontroller@Departments2' ]);
Route::get('statistics_clinic', ['middleware' => 'auth', 'uses' => 'StaffController@Staff' ]);

Route::get('main',  function()
{
return view('main');
});

Route::get('main_reg',  function()
{
return view('main_reg');
});

Route::get('look_hospital_stat', ['middleware' => 'auth' ,  function()
{
return view('look_hospital_stat');
}]);

Route::get('look_outpatient_stat', ['middleware' => 'auth' ,  function()
{
return view('look_outpatient_stat');
}]);
Route::get('look_clinic_stat', ['middleware' => 'auth' ,  function()
{
return view('look_clinic_stat');
}]);

Route::get('look_staff_stat', ['middleware' => 'auth' ,  function()
{
return view('look_staff_stat');
}]);

Route::get('hospital_doctor', ['middleware' => ['auth'], function()
{   

    return view('hospital_doctor');
}]);


Route::get('auth/regulations',  function()
{
return view('auth/regulations');
});



Route::get('statistics_staff', ['middleware' => 'auth' , function()
{
return view('statistics_staff');
}]);

Route::get('doctor_staff', ['middleware' => ['auth'], function()
{   
return view('doctor_staff');
}]);

Route::get('doctor_clinic', ['middleware' => ['auth'], function()
{   
    return view('doctor_clinic');
}]);

Route::get('nastroy', ['middleware' => ['auth'], function()
{
return view('nastroy');
}]);

Route::get('outpatient_doctor', ['middleware' => ['auth'], function()
{
return view('outpatient_doctor');
}]);

Route::get('admin', ['middleware' => ['auth'], function(\Illuminate\Http\Request $request)
{   
    
    $beds = DB::table('beds')
            ->join('departments', 'beds.department_id', '=', 'departments.id')
            ->join('queue', 'beds.department_id', '=', 'queue.id')
            ->leftJoin('plans', 'beds.department_id', '=', 'plans.id');

   //$beds = Beds::select('id', 'bed_numbers_facts', 'received', 'died', 'composed_at_beginning', 'department_id', 'written_out');
    //$departments = departments::select('department_name');
  $bedsTableView = TableView::collection( $beds, 'Beds' )
      ->column('Тип дневного стационара', 'department_name:sort')
     //->column('Количество коек (план)',  'plans.beds_numbers:sort')
       // ->column('Количество коек (факт)', 'queue.bed_numbers_facts:sort,search')
        ->column('Состаяние на начало дня', 'composed_at_beginning:sort,search')
        ->column('Поступило', 'received:sort,search')
      ->column('Из них планово',   'beds_numbers:sort')
        ->column('До 7 дней',  'wait_up_to_7_days:sort')
        ->column('До 8-14 дней', 'wait_8_14_days:sort')
        ->column('До 15-30 дней', 'wait_15_30_days:sort')
        ->column('Более 30 дней',  'wait_more_than_30_days:sort')
        ->column('Выписано', 'written_out:sort,search')
        ->column('Умерло', 'died:sort,search')
->build();
        
    return view('admin', [
        'bedsTableView' => $bedsTableView
        //'graph_type' => 'line-chart'
    ]);
}]);





Route::get('auth/regulations',  function()
{
return view('auth/regulations');
});



Route::post('stat', 
  ['uses' => 'RequestController@stationar_add', 'as' => 'stat_add']);

  
Route::post('outpatient', 
  ['uses' => 'RequestController@outpatient_add', 'as' => 'outpatient_add']);

Route::post('clinic', 
  ['uses' => 'RequestController@clinic_add', 'as' => 'clinic_add']);
  
 Route::post('staff', 
  ['uses' => 'RequestController@staff_add', 'as' => 'staff_add']);
  
  Route::post('staf', 
  ['uses' => 'RequestController@staff_add', 'as' => 'staf_add']);
  
Route::post('update', 
  ['uses' => 'UserController@update', 'as' => 'update']);
  
  Route::post('regorg', 
  ['uses' => 'RequestController@regorg_add', 'as' => 'regorg_add']);
  
Route::get('api', function(){
  // Get the number of days to show data for, with a default of 7

$column = Input::get('days');
$department = Input::get('department');
$start_date = Input::get('start_date');
$end_date = Input::get('end_date');
$stats = day_stationar::select('date_day_stationar', $column.' as values')
            ->where('date_day_stationar', '>=', $start_date)
            ->where('date_day_stationar', '<=', $end_date)
            ->get(); 


 
    /* $stats = DB::table('beds')
            ->join('departments', 'beds.department_id', '=', 'departments.id')
            ->join('queue', 'beds.department_id', '=', 'queue.id')
            ->leftJoin('plans', 'beds.department_id', '=', 'plans.id')
            ->select('date', $column.' as values')
            ->where('department_name', '=', $department)
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->get(); */

  return $stats;
});


Route::get('outpatient_doctor',
 ['uses' => 'OutpatientDataTableController@index', 'as' => 'outpatient_doctor']);
 
Route::get('hospital_doctor',
['uses' => 'HospitalDataTableController@index', 'as' => 'hospital_doctor']);

Route::get('doctor_staff',
['uses' => 'StaffDataTableController@index', 'as' => 'doctor_staff']);

Route::get('doctor_clinic',
['uses' => 'ClinicDataTableController@index', 'as' => 'doctor_clinic']);

Route::resource('admin', 'UserDataTableController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
