<?php

namespace App\DataTables;
use App\BedProfile;
use App\departments;
use DB;
use Carbon\Carbon;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Input;

class HospitalDataTable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
public function ajax()
{   
    $collection = collect([]);
    $start_date = Input::get('start_date');;
    $end_date = Input::get('end_date');
    $start = Carbon::parse($start_date);
    $end = Carbon::parse($end_date);
    $days = $start->diffInDays($end);
//$days = 2;
$bed_profiles = BedProfile::get();
foreach ($bed_profiles as $bed_profile)
{
$bed_name = $bed_profile->bed_name;
$received = $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->sum('received_stationar');
$died = $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->sum('died');
$cured = $received + $died;
$day_begining = $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->sum('day_begining');
$discharged_stationar = $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->sum('discharged_stationar');
$beddays_spent = $day_begining + $discharged_stationar - $died - $received;
$bed_numbers_fact = $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->sum('bed_numbers_fact');

$avg_bed_occupancy = $beddays_spent/$bed_numbers_fact/$days;
$avg_year_prediction = ($avg_bed_occupancy/$days)*365;
$avg_treat_dur = $beddays_spent/(($received+$died+$discharged_stationar)/2);
$bed_rotation = ($discharged_stationar+$died)/$bed_numbers_fact/$days;
$hospital_lethality = $died/($discharged_stationar+$died);
$avg_year_bed = $bed_numbers_fact/$days;
$bed_occupancy_norm = $bed_profile->Norm->bed_occupation;
$treat_dur_norm = $bed_profile->Norm->average_treatment_duration;
$bed_occupancy_norm_percent = $avg_bed_occupancy/$bed_occupancy_norm*100;
$treat_dur_norm_percent = $avg_treat_dur/$treat_dur_norm*100;
$bed_occupancy_norm_percent = $bed_occupancy_norm_percent.'%';
$treat_dur_norm_percent = $treat_dur_norm_percent.'%';
$plan_patients_treated = $bed_profile->Stationar->Plan->patients_treated;
$plan_average_treatment = $bed_profile->Stationar->Plan->average_treatment;
$plan_bed_days_held = $bed_profile->Stationar->Plan->bed_days_held;
$plan_bed_occupation = $plan_patients_treated;
$plan_patients_treated_percent = $cured/$plan_patients_treated*100;
$plan_average_treatment_percent = $avg_treat_dur/$plan_average_treatment*100;
$plan_bed_days_held_percent = $beddays_spent/$plan_bed_days_held*100;
$plan_bed_occupation_plan_percent = $avg_bed_occupancy/$plan_bed_occupation*100;
$wait_7 =  $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->avg('wait_7');
$wait_8_14 =  $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->avg('wait_8_14');
$wait_15_30 =  $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->avg('wait_15-30');
$wait_30 =  $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->avg('wait_30');

$collection->push(['bed_name' => $bed_name,
                   'cured' => $cured,
                   'beddays_spent' => $beddays_spent,
                   'avg_bed_occupancy' => $avg_bed_occupancy,
                   'avg_year_prediction' => $avg_year_prediction,
                   'avg_treat_dur' => $avg_treat_dur,
                   'hospital_lethality' => $hospital_lethality,
                   'avg_year_bed' => $avg_year_bed,
                   'bed_rotation' => $bed_rotation,
                   'bed_occupancy_norm' => $bed_occupancy_norm,
                   'treatment_dur_norm' => $treat_dur_norm,
                   'bed_occupancy_norm_percent' => $bed_occupancy_norm_percent,
                   'treatment_dur_norm_percent' => $treat_dur_norm_percent,
                   'wait_7' => $wait_7,
                   'wait_8_14' => $wait_8_14,
                   'wait_15_30' => $wait_15_30,
                   'wait_30' => $wait_30,
                   'bed_occupancy_norm' => $bed_occupancy_norm,
'treat_dur_norm' => $treat_dur_norm,
'bed_occupancy_norm_percent' => $bed_occupancy_norm_percent,
'treat_dur_norm_percent' => $treat_dur_norm_percent,
'bed_occupancy_norm_percent' => $bed_occupancy_norm_percent,
'treat_dur_norm_percent' => $treat_dur_norm_percent,
'plan_patients_treated' => $plan_patients_treated,
'plan_average_treatment' => $plan_average_treatment,
'plan_bed_days_held' => $plan_bed_days_held,
'plan_bed_occupation_plan' => $plan_bed_occupation,
'plan_patients_treated_percent' => $plan_patients_treated_percent,
'plan_average_treatment_percent' => $plan_average_treatment_percent,
'plan_bed_days_held_percent' => $plan_bed_days_held_percent,
'plan_bed_occupation_plan_percent' => $plan_bed_occupation_plan_percent,
                   
                 ]);

}
    return $this->datatables
        ->of($collection)
        ->make(true);
      
}

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
public function query()
{   $test = Input::get('test');

   //$departments = BedProfile::with('DayStationar', 'Norm')->select('*');
$departments = $collection;
   //$departments = DB::table('departments')->select(['department_name', 'id']); 
    return $this->applyScopes($departments);
}

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
public function html()
{
    return $this->builder()
        ->columns([ 
         "bed_name" => ["title" => "Профиль койки"] ,
         "cured" => ["title" => "Профиль койки"] ,
         'avg_bed_occupancy' => ['title' => 'Средняя занятость койки'],
         'avg_year_prediction' => ['title' => 'Средняя занятость койки прогноз на конец года'],
         'avg_treat_dur' => ['title' => 'Средний срок лечения'],
         'bed_rotation' => ['title' => 'Оборот койки'],
         'bed_occupancy_norm' => ['title' => 'Занятость койки норматив'],
         'treatment_dur_norm' => ['title' => 'Ср. длит норматив'],
         'bed_occupancy_norm_percent' => ['title' => 'Занятость койки % вып.'],
         'treatment_dur_norm_percent' => ['title' => 'Ср. длит % вып.'],

        ])
        
        ->parameters([
            'dom' => 'Bfrtip',
            'buttons' => ['csv', 'excel', 'print', 'reset', 'reload'],
         

        ]);
}
    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
        'departments.department_name',
        'id',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {   $day = Carbon::Today()->toDateString();
        $file_name = 'stationar_'.$day;
        return $file_name;
    }
}
