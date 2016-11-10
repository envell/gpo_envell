<?php

namespace App\DataTables;
use App\position;
use App\departments;
use App\employee_position;
use App\employee_status;
use App\employee_moonlighting;
use App\employee;
use DB;
use Carbon\Carbon;
use Yajra\Datatables\Services\DataTable;
use Illuminate\Support\Facades\Input;

class StaffDataTable extends DataTable
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
$positions = position::get();
foreach ($positions as $position)
{ 
$position_name = $position->position_name;
$employee_moonlightings = employee_moonlighting::get();
$query = employee_moonlighting::with('employee_status')->where('moonlighting_id', '=', '1');
$query->whereHas('employee_status', function($query) use ($start_date)
{
        $query->where('date_employee_status', '=', $start_date);
}); 
$persons_at_the_main_place = $query->count();

$stake_numbers = $position->state_schedule->stake_numbers;

$stake_employed = employee_position::where('position_id', '=', $position->id)->count();
$staffing_occupied_posts = $stake_numbers/$stake_employed;
$staffing_individuals = $persons_at_the_main_place/$stake_numbers;
$coefficient_of_combining = $stake_employed/$persons_at_the_main_place;
$persons_at_the_internal_external_moonlighting = employee_moonlighting::where('moonlighting_id', '=', '2')->count();
$persons_at_decreet = employee_status::where('decree', '=', '1')->count();
$staffing_occupied_posts = $stake_numbers/$stake_employed;
$staffing_individuals = $persons_at_the_main_place/$stake_employed;
$coefficient_of_combining = $stake_employed/$persons_at_the_main_place;
    
$collection->push(['position_name' => $position_name,
                   'stake_numbers' => $stake_numbers,
                   'stake_employed' => $stake_employed,
                   'persons_at_the_main_place' => $persons_at_the_main_place,
                   'persons_at_the_internal_external_moonlighting' => $persons_at_the_internal_external_moonlighting,
                   'persons_at_decreet' => $persons_at_decreet,
                   'staffing_occupied_posts' => $staffing_occupied_posts,
                   'staffing_individuals' => $staffing_individuals,
                   'coefficient_of_combining' => $coefficient_of_combining,
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
