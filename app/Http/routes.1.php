<?php
use App\Beds;
use App\Hospital;
use App\departments;
use App\staff;

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

Route::get('main_reg',  ['middleware' => ['auth'], 'uses' => 'departmentscontroller@Departments']);

Route::get('hospital_doctor', ['middleware' => ['auth'], function()
{   
    
    $hospital= DB::table('beds')   
             ->join('departments', 'beds.department_id', '=', 'departments.id')
             ->join('queue', 'beds.department_id', '=', 'queue.id')
            ->leftJoin('values', 'beds.department_id', '=', 'values.id');


 
   //$beds = Beds::select('id', 'bed_numbers_facts', 'received', 'died', 'composed_at_beginning', 'department_id', 'written_out');
    //$departments = departments::select('department_name');
  $hospitalTableView = TableView::collection($hospital, 'Hospital')
        ->column('Отделение/профиль', 'department_name:sort')
     //->column('Количество коек (план)',  'plans.beds_numbers:sort')
       // ->column('Количество коек (факт)', 'queue.bed_numbers_facts:sort,search')
        ->column('Пролечено',['id:sort',  function ($beds) 
        {   $result = $beds->died + $beds->received;
            return $result;
        }])
        ->column('Дата',  'date:sort*')
        ->column('Ср. занятость койки',  'wait_up_to_7_days:sort')
        ->column('Ср. занятость койки по прогнозу на конец года', 'wait_8_14_days:sort')
        ->column('Ср. срок лечения', ['id:sort',  function ($beds) 
        {   $result2 = round($beds->held_beddays/(($beds->died + $beds->received + $beds->written_out)/2)).' дн.';
            return $result2;
        }])
        ->column('Оборот койки',  'wait_more_than_30_days:sort')
        ->column('Больн. летальность',  ['id:sort',  function ($beds) 
        {   $result1 = round(($beds->died/($beds->died + $beds->received))*100).'%';
            return $result1;
        }])
        ->column('Очередь планово',  'plan:sort')
        ->column('Очередь до 7 дней',  'wait_up_to_7_days:sort')
        ->column('Очередь 8-14 дней',  'wait_8_14_days:sort')
        ->column('Очередь 15-30 дней',  'wait_15_30_days:sort')
        ->column('Очередь более 30 дней',  'wait_more_than_30_days:sort')
        ->column('Норматив занятость койки',  'wait_more_than_30_days:sort')
        ->column('Ср. длит.',  'wait_more_than_30_days:sort')
        ->column('Оч. госпит.',  'wait_more_than_30_days:sort')
        ->column('% выполнения норматива',  'wait_more_than_30_days:sort')
        ->column('Пролечено пациентов по плану',  'wait_more_than_30_days:sort')
        ->column('Проведено койко-дней по плану',  'wait_more_than_30_days:sort')
        ->column('Средняя длительность лечения по плану',  'wait_more_than_30_days:sort')
        ->column('Занятость койки по плану',  'wait_more_than_30_days:sort')
        ->column('Пролечено пациентов',  'wait_more_than_30_days:sort')
        ->column('Проведено койко-дней',  'held_beddays:sort')
        ->column('Средняя длительность лечения',  'wait_more_than_30_days:sort')
        ->column('Занятость койки',  'wait_more_than_30_days:sort')
->build();

 
        
    return view('hospital_doctor', [
        'hospitalTableView' => $hospitalTableView
        //'graph_type' => 'line-chart'
    ]);
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
    
    $staff = DB::table('staff')
                 ->join('posts', 'staff.post_id', '=', 'posts.id');
               //  ->join('rates_fact', 'staff.staff_id', '=', 'rates_fact.id');
            //   ->join('posts', 'specific_weight_visits.staff_id', '=', 'posts.id');
            //   ->join('queue', 'beds.department_id', '=', 'queue.id');

   //$beds = Beds::select('id', 'bed_numbers_facts', 'received', 'died', 'composed_at_beginning', 'department_id', 'written_out');
    //$departments = departments::select('department_name');
  $staffTableView = TableView::collection($staff, 'staff')
     //->column('Количество коек (план)',  'plans.beds_numbers:sort')
       // ->column('Количество коек (факт)', 'queue.bed_numbers_facts:sort,search')
        ->column('Должность/категория персонала', 'post:sort')
        ->column('Ставок по штату',  'post:sort')
        ->column('Ставок занято', 'post:sort')
        ->column('Физических лиц по основному месту работы', 'post:sort')
        ->column('Физических лиц по внутреннему/внешнему совместительству', 'post:sort')
        ->column('Физических лиц в декрете',   'post:sort')
        ->column('Укомплектованность штатов занятыми должностями',  'post:sort')
        ->column('Укомплектованность штатов физическими лицами', 'post:sort')
        ->column('Коэффициент совместительства', 'post:sort')
->build();
        
    return view('doctor_staff', [
        'staffTableView' => $staffTableView
        //'graph_type' => 'line-chart'
    ]);
}]);

Route::get('doctor_clinic', ['middleware' => ['auth'], function()
{   
    
    $clinic = DB::table('staff')
    //            ->raw("CONCAT(firstname,' ', lastname, ' ', middlename) AS full_name, id");

   
           // ->join('staff', 'clinic_visits.specific_weight_vivists', '=', 'departments.id');
         ->join('posts', 'staff.post_id', '=', 'posts.id')
         ->join('clinic_visits', 'staff.id', '=', 'clinic_visits.id')
         ->join('specific_weight_visits', 'staff.id', '=', 'specific_weight_visits.id')
         ->join('home_visits', 'staff.id', '=', 'home_visits.id');

   //$beds = Beds::select('id', 'bed_numbers_facts', 'received', 'died', 'composed_at_beginning', 'department_id', 'written_out');
    //$departments = departments::select('department_name');
  $clinicTableView = TableView::collection($clinic, 'clinic')
        ->column('Ф.И.О. врача/среднего медицинского персонала', ['id:sort', function ($staff) 
        {   $result2 = ($staff->firstname).' '.($staff->lastname).' '.($staff->middlename);
            return $result2;
        }])
        ->column('Должность', 'post:sort')
        ->column('Количество ставок', 'staff_number_id:sort')
        ->column('Число посещений в поликлиннике всего',  'all:sort')
        ->column('Число посещений в поликлинике по заболеванию', 'disease:sort,search')
        ->column('Число посещений в поликлинике профилактические', 'preventive:sort,search')
        ->column('Число посещений на дому всего', 'all:sort,search')
        ->column('Число посещений на дому по заболеванию', 'disease:sort')
        ->column('Число посещений на дому профилактические', 'preventive:sort')
        ->column('Число посещений по ОМС', 'OMC:sort')
        ->column('Число посещений бюджетные', 'budget:sort')
        ->column('Число посещений платные', 'paid:sort')
        ->column('Всего посещений', ['id:sort', function ($staff) 
        {   $result2 = ($staff->all)+($staff->all);
            return $result2;
        }])
        ->column('Удельный вес посещений на дому', ['id:sort', function ($staff) 
        {   $result2 = ($staff->all)/(($staff->all)+($staff->all));
            return $result2;
        }])
        ->column('Удельный вес посещений по заболеванию', ['id:sort', function ($staff) 
        {   $result2 = (($staff->disease)+($staff->disease))/(($staff->all)+($staff->all));
            return $result2;
        }])
        ->column('Удельный вес профилактических посещений ', ['id:sort', function ($staff) 
        {   $result2 = (($staff->preventive)+($staff->preventive))/(($staff->all)+($staff->all));
            return $result2;
        }])
        ->column('Удельный вес посещений по ОМС', ['id:sort', function ($staff) 
        {   $result2 = (($staff->OMC))/(($staff->all)+($staff->all));
            return $result2;
        }])
        ->column('Удельный вес бюджетных посещений',  ['id:sort', function ($staff) 
        {   $result2 = (($staff->budget))/(($staff->all)+($staff->all));
            return $result2;
        }])
        ->column('Удельный вес платных посещений ',  ['id:sort', function ($staff) 
        {   $result2 = (($staff->paid))/(($staff->all)+($staff->all));
            return $result2;
        }])
        ->column('Нагрузка на занятую должность', ['id:sort', function ($staff) 
        {   $result2 = (($staff->preventive)+($staff->preventive))/(($staff->all)+($staff->all));
            return $result2;
        }])
        ->column('Нагрузка на год',  ['id:sort', function ($staff) 
        {   $result2 = ($staff->all)+($staff->all);
            return $result2;
        }])
        ->column('Выполнение нагрузки', 'decree:sort')
->build();
        
    return view('doctor_clinic', [
        'clinicTableView' => $clinicTableView
        //'graph_type' => 'line-chart'
    ]);
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

Route::get('outpatient_doctor', ['middleware' => ['auth'], function(\Illuminate\Http\Request $request) 
{   
    
    $beds = DB::table('beds')
            ->join('departments', 'beds.department_id', '=', 'departments.id')
            ->join('queue', 'beds.department_id', '=', 'queue.id')
            ->leftJoin('plans', 'beds.department_id', '=', 'plans.id');

   //$beds = Beds::select('id', 'bed_numbers_facts', 'received', 'died', 'composed_at_beginning', 'department_id', 'written_out');
    //$departments = departments::select('department_name');
  $bedsTableView = TableView::collection( $beds, 'Beds' )
        ->column('Тип дневного стационара/профиль койко-места', 'department_name:sort')
        ->column('Средняя занятость койки по факту',  'wait_up_to_7_days:sort')
        ->column('Средняя занято��ть койки прогноз на конец года по факту', 'wait_up_to_7_days:sort')
        ->column('Ср. срок лечения по факту', ['id:sort',  function ($beds) 
        {   $result2 = round($beds->held_beddays/(($beds->died + $beds->received + $beds->written_out)/2)).' дн.';
            return $result2;
        }])
        ->column('Оборот койки по факту', 'received:sort,search')
      ->column('Занятость койки по нормативу',   'beds_numbers:sort')
        ->column('Ср. длит. по нормативу',  'wait_up_to_7_days:sort')
        ->column('Занятость койки по нормативу в %', 'wait_8_14_days:sort')
        ->column('Ср. длит. по нормативу в %', 'wait_15_30_days:sort')
->build();
        
    return view('outpatient_doctor', [
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
  
  Route::post('regorg', 
  ['uses' => 'RequestController@regorg_add', 'as' => 'regorg_add']);
  
Route::post('update', 
  ['uses' => 'UserController@update', 'as' => 'update']);
  
Route::get('api', function(){
  // Get the number of days to show data for, with a default of 7

$column = Input::get('days');
$department = Input::get('department');
$start_date = Input::get('start_date');
$end_date = Input::get('end_date');



 
    $stats = DB::table('beds')
            ->join('departments', 'beds.department_id', '=', 'departments.id')
            ->join('queue', 'beds.department_id', '=', 'queue.id')
            ->leftJoin('plans', 'beds.department_id', '=', 'plans.id')
            ->select('date', $column.' as values')
            ->where('department_name', '=', $department)
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->get();

  return $stats;
});


Route::get('outpatient_doctor',
 ['uses' => 'OutpatientDataTableController@index', 'as' => 'outpatient_doctor']);

Route::resource('admin', 'UserDataTableController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
