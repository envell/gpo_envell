<?php namespace App\Http\Controllers;
use App\departments;
use App\Beds;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\BedProfile;


class TestController extends Controller
{

    public function test()
    {
$collection = collect([]);
$start_date = "2016-07-01";
$end_date = "2116-07-01";
$days = 2;
$bed_profiles = BedProfile::get();
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
foreach ($bed_profile->Stationar() as $stationar)
{
$stationar->Plan->patients_treated;
}
//$plan_patients_treated = $bed_profile->Stationar()->Plan->sum('patients_treated');

$plan_average_treatment = $bed_profile->Stationar->Plan->average_treatment;
$plan_bed_days_held = $bed_profile->Stationar->Plan->bed_days_held;
$plan_bed_occupation_plan = $plan_patients_treated;
$plan_patients_treated_percent = $cured/$plan_patients_treated*100;
$plan_average_treatment_percent = $avg_treat_dur/$plan_average_treatment*100;
$plan_bed_days_held_percent = $beddays_spent/$plan_bed_days_held*100;
$plan_bed_occupation_plan_percent = $avg_bed_occupancy/$plan_bed_occupation*100;
$wait_7 =  $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->last('wait_7');
$wait_8_14 =  $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->last('wait_8_14');
$wait_15_30 =  $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->last('wait_15_30');
$wait_30 =  $bed_profile->Stationar()->whereBetween('date_stationar', [$start_date, $end_date])->last('wait_30');

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
'plan_bed_occupation_plan' => $plan_bed_occupation_plan,
'plan_patients_treated_percent' => $plan_patients_treated_percent,
'plan_average_treatment_percent' => $plan_average_treatment_percent,
'plan_bed_days_held_percent' => $plan_bed_days_held_percent,
'plan_bed_occupation_plan_percent' => $plan_bed_occupation_plan_percent,
                   
                 ]);

}
echo $collection;
    }
    
}