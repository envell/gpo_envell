<?php

namespace App\DataTables;
use App\BedProfile;
use App\departments;
use DB;
use Carbon\Carbon;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Input;

class OutpatientDataTable extends DataTable
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
$bed_numbers = $bed_profile->DayStationar()->whereBetween('date_day_stationar', [$start_date, $end_date])->sum('bed_numbers');
$bed_fact = $bed_profile->DayStationar()->whereBetween('date_day_stationar', [$start_date, $end_date])->sum('bed_numbers_fact_coefficient');
$received = $bed_profile->DayStationar()->whereBetween('date_day_stationar', [$start_date, $end_date])->sum('received');
$discharged = $bed_profile->DayStationar()->whereBetween('date_day_stationar', [$start_date, $end_date])->sum('discharged');
$avg_bed_occupancy = $bed_numbers/$bed_fact/$days;
$avg_year_prediction = ($avg_bed_occupancy/$days)*365;
$avg_treat_dur = $bed_numbers/(($received+$discharged)/2);
$bed_rotation = $discharged/$bed_fact/$days;
$bed_occupancy_norm = $bed_profile->Norm->bed_occupation;
$treat_dur_norm = $bed_profile->Norm->average_treatment_duration;
$bed_occupancy_norm_percent = $avg_bed_occupancy/$bed_occupancy_norm*100;
$treat_dur_norm_percent = $avg_treat_dur/$treat_dur_norm*100;
$bed_occupancy_norm_percent = $bed_occupancy_norm_percent.'%';
$treat_dur_norm_percent = $treat_dur_norm_percent.'%';
$collection->push(['bed_name' => $bed_name,
                   'avg_bed_occupancy' => $avg_bed_occupancy,
                   'avg_year_prediction' => $avg_year_prediction,
                   'avg_treat_dur' => $avg_treat_dur,
                   'bed_rotation' => $bed_rotation,
                   'bed_occupancy_norm' => $bed_occupancy_norm,
                   'treatment_dur_norm' => $treat_dur_norm,
                   'bed_occupancy_norm_percent' => $bed_occupancy_norm_percent,
                   'treatment_dur_norm_percent' => $treat_dur_norm_percent,
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
        $file_name = 'day_stationar_'.$day;
        return $file_name;
    }
}
