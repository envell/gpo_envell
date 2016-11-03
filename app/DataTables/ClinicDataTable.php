<?php
namespace App\DataTables;
use App\employee;
use App\departments;
use App\employee_position;
use App\position;
use DB;
use Carbon\Carbon;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Input;
class ClinicDataTable extends DataTable
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
$employees = employee::get();
foreach ($employees as $employee)
{
$employee_name = $employee->surname.' '.$employee->name.' '.$employee->patronymic;

$position_name=NULL;
$employee_positions = employee_position::where('employee_id', '=', $employee->id)->get();
foreach($employee_positions as $employee_position)
{
$position_name = $position_name.' '.$employee_position->position->position_name;
}

$stake_numbers_fact = $employee->stake_numbers_fact;
$hospital_disease = $employee->visit_numbers()->whereBetween('date_visit_numbers', [$start_date, $end_date])->sum('hospital_disease');
$hospital_profilactic = $employee->visit_numbers()->whereBetween('date_visit_numbers', [$start_date, $end_date])->sum('hospital_profilactic');
$home_disease = $employee->visit_numbers()->whereBetween('date_visit_numbers', [$start_date, $end_date])->sum('home_disease');
$home_profilactic = $employee->visit_numbers()->whereBetween('date_visit_numbers', [$start_date, $end_date])->sum('home_profilactic');
$all_in_hospital = $hospital_profilactic+$hospital_disease;
$all_in_home = $home_profilactic+$home_disease;
$payment_omc = $employee->visit_numbers()->whereBetween('date_visit_numbers', [$start_date, $end_date])->sum('payment_omc');
$payment_budget = $employee->visit_numbers()->whereBetween('date_visit_numbers', [$start_date, $end_date])->sum('payment_budget');
$payment_paid = $employee->visit_numbers()->whereBetween('date_visit_numbers', [$start_date, $end_date])->sum('payment_paid');
$total_visits = $all_in_home+$all_in_hospital;
$percent_at_home = $all_in_home/$total_visits;
$percent_disease = ($home_disease+$hospital_disease)/$total_visits;
$percent_profilactic = ($hospital_profilactic+$home_profilactic)/$total_visits;
$percent_omc = $payment_omc/$total_visits;
$percent_budget = $payment_budget/$total_visits;
$percent_paid = $payment_paid/$total_visits;
$load_for_positions = $total_visits/$stake_numbers_fact;
$year_visits = $employee->load_plan->year_visits;
$performing_load = ($load_for_positions/$days*365)/$year_visits;
$collection->push(['name' => $employee_name,
                   'position_name' => $position_name,
                   'stake_numbers_fact' => $stake_numbers_fact,
                   'all_in_hospital' => $all_in_hospital,
                   'hospital_disease' => $hospital_disease,
                   'hospital_profilactic' => $hospital_profilactic,
                   'all_in_home' => $all_in_home,
                   'home_disease' => $home_disease,
                   'home_profilactic' => $home_profilactic,
                   'payment_omc' => $payment_omc,
                   'payment_budget' => $payment_budget,
                   'payment_paid' => $payment_paid,
                   'total_visits' => $total_visits, //обработать деление на 0
                   'percent_at_home' => $percent_at_home,
                   'percent_disease' => $percent_disease,
                   'percent_profilactic' => $percent_profilactic,
                   'percent_omc' => $percent_omc,
                   'percent_budget' => $percent_budget,
                   'percent_paid' => $percent_paid,
                   'load_for_positions' => $load_for_positions,
                   'attendance_for_the_year' => $year_visits,
                   'performing_load' => $performing_load,
                   
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