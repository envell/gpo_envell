<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		
		Schema::create('street', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('street_name');
		});
		Schema::create('city', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('city_name');
		});
		Schema::create('country', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('country_name');
		});
		Schema::create('hospital', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('hospital_name');
		$table->string('home');
		$table->integer('index');
		$table->integer('street_id')->unsigned()->nullable();
		$table->foreign('street_id')->references('id')->on('street')->onDelete('set null');
		$table->integer('city_id')->unsigned()->nullable();
		$table->foreign('city_id')->references('id')->on('city')->onDelete('set null');
		$table->integer('country_id')->unsigned()->nullable();
		$table->foreign('country_id')->references('id')->on('country')->onDelete('set null');
		});
		Schema::create('moonlighting', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('moonlighting_name');
		});
		Schema::create('unit', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('unit_name');
		$table->integer('hospital_id')->unsigned()->nullable();
		$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
		});
		Schema::create('load_plan', function(Blueprint $table)
		{
		$table->increments('id');
		$table->integer('year_visits');
		});
	
		Schema::create('state_schedule', function(Blueprint $table)
		{
		$table->increments('id');
		$table->float('stake_numbers');
		$table->integer('hospital_id')->unsigned()->nullable();
		$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
		});
		
	    Schema::create('employee_category', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('category_name');
		$table->integer('hospital_id')->unsigned()->nullable();
		$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
		$table->integer('state_schedule_id')->unsigned()->nullable();
		$table->foreign('state_schedule_id')->references('id')->on('state_schedule')->onDelete('cascade');
		});	

		Schema::create('employee', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('surname');
		$table->string('name');
		$table->string('patronymic');
		});
		
		Schema::create('employee_status', function(Blueprint $table)
		{
		$table->increments('id');
		$table->date('date_employee_status');
		$table->boolean('decree');
		$table->float('stake_numbers_fact');
		$table->integer('hospital_id')->unsigned()->nullable();
		$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
		$table->integer('unit_id')->unsigned()->nullable();
		$table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade');
		$table->integer('load_plan_id')->unsigned()->nullable();
		$table->foreign('load_plan_id')->references('id')->on('load_plan')->onDelete('cascade');
		$table->integer('employee_category_id')->unsigned()->nullable();
		$table->foreign('employee_category_id')->references('id')->on('employee_category')->onDelete('cascade');
		$table->integer('employee_id')->unsigned()->nullable();
		$table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');
		});
		
		Schema::create('employee_moonlighting', function(Blueprint $table)
		{
		$table->increments('id');
		$table->integer('year_visits');
		$table->integer('moonlighting_id')->unsigned()->nullable();
		$table->foreign('moonlighting_id')->references('id')->on('moonlighting')->onDelete('cascade');
		$table->integer('employee_status_id')->unsigned()->nullable();
		$table->foreign('employee_status_id')->references('id')->on('employee_status')->onDelete('cascade');
		});
		
		Schema::create('funding_type', function(Blueprint $table)
		{
		$table->increments('id');
		$table->boolean('oms');
		$table->boolean('budget');
		$table->boolean('paid');
		});
		

		
		Schema::create('position', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('position_name');
		$table->integer('funding_type_id')->unsigned()->nullable();
		$table->foreign('funding_type_id')->references('id')->on('funding_type')->onDelete('cascade');
		$table->integer('state_schedule_id')->unsigned()->nullable();
		$table->foreign('state_schedule_id')->references('id')->on('state_schedule')->onDelete('cascade');
		});
		
		
		Schema::create('employee_position', function(Blueprint $table)
		{
		$table->increments('id');
		$table->integer('employee_status_id')->unsigned()->nullable();
		$table->foreign('employee_status_id')->references('id')->on('employee_status')->onDelete('cascade');
		$table->integer('position_id')->unsigned()->nullable();
		$table->foreign('position_id')->references('id')->on('position')->onDelete('cascade');
		});		

		
	    Schema::create('visit_numbers', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('category_name');
		$table->integer('hospital_disease');
		$table->integer('hospital_profilactic');
		$table->integer('home_disease');
		$table->integer('home_profilactic');
		$table->float('payment_paid');
		$table->float('payment_omc');
		$table->float('payment_budget');
		$table->date('date_visit_numbers');
		$table->integer('employee_id')->unsigned()->nullable();
		$table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');
		$table->integer('hospital_id')->unsigned()->nullable();
		$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
		});	
		
	    Schema::create('plan', function(Blueprint $table)
		{
		$table->increments('id');
		$table->integer('patients_treated');
		$table->float('average_treatment');
		$table->float('bed_days_held');
		$table->float('bed_occupation_plan');
		});			
		
		
		Schema::create('bed_plan', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('bed_numbers_bed_plan');
		});	
		

		Schema::create('norm', function(Blueprint $table)
		{
		$table->increments('id');
		$table->integer('hospitalization_queue');
		$table->float('average_treatment_duration');
		$table->float('bed_occupation');
		});
		
		Schema::create('plan_coefficient', function(Blueprint $table)
		{
		$table->increments('id');
		$table->integer('bed_numbers_plan_coefficient');
		});	

		Schema::create('department', function(Blueprint $table)
	{
		$table->increments('id');
		$table->string('department_name');
		$table->integer('hospital_id')->unsigned()->nullable();
		$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
	});

		Schema::create('bed_profile', function(Blueprint $table)
	{
		$table->increments('id');
		$table->string('bed_name');
		$table->integer('department_id')->unsigned()->nullable();
		$table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
		$table->integer('norm_id')->unsigned()->nullable();
		$table->foreign('norm_id')->references('id')->on('norm')->onDelete('set null');
		$table->integer('bed_plan_id')->unsigned()->nullable();
		$table->foreign('bed_plan_id')->references('id')->on('bed_plan')->onDelete('set null');	
	});
		
		Schema::create('day_stationar', function(Blueprint $table)
		{
		$table->increments('id');
		$table->integer('bed_numbers');
		$table->integer('bed_numbers_fact_coefficient');
		$table->integer('day_begining');
		$table->integer('received');
		$table->integer('discharged');
		$table->string('type_day_stationar');
		$table->date('date_day_stationar');
		$table->integer('hospital_id')->unsigned()->nullable();
		$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
		$table->integer('plan_coefficient')->unsigned()->nullable();
		$table->foreign('plan_coefficient')->references('id')->on('plan_coefficient')->onDelete('set null');
		$table->integer('bed_profile_id')->unsigned()->nullable();
		$table->foreign('bed_profile_id')->references('id')->on('bed_profile')->onDelete('set null');
		});

	

		
		Schema::create('stationar', function(Blueprint $table)
		{
		$table->increments('id');
		$table->integer('bed_numbers_fact');
		$table->integer('day_begining');
		$table->integer('wait_7');
		$table->integer('wait_8_14');
		$table->integer('wait_15-30');
		$table->integer('wait_30');
		$table->integer('died');
		$table->integer('received_stationar');
		$table->integer('discharged_stationar');
		$table->date('date_stationar');
		$table->integer('hospital_id')->unsigned()->nullable();
		$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
		$table->integer('plan_id')->unsigned()->nullable();
		$table->foreign('plan_id')->references('id')->on('plan')->onDelete('set null');
		$table->integer('bed_profile_id')->unsigned()->nullable();
		$table->foreign('bed_profile_id')->references('id')->on('bed_profile')->onDelete('set null');
	
		});
		
	
	
	   Schema::create('users', function(Blueprint $table)
{   	$table->increments('id');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('imag');
	   // $table->string('password_confirmation');
        $table->string('confirmation_code');
        $table->string('remember_token')->nullable();
        $table->boolean('confirmed')->default(false);
        $table->timestamps();
		$table->string('lastname');
		$table->string('name');
		$table->string('middlename');
	//	$table->string('username');
		$table->string('post');
		$table->string('phone_number');
//		$table->rememberToken();
});
      

		Schema::create('password_reminders', function (Blueprint $table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
		

		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	
	{	Schema::dropIfExists('users');
		Schema::dropIfExists('password_reminders');
		Schema::dropIfExists('stationar');
		Schema::dropIfExists('day_stationar');
		Schema::dropIfExists('bed_profile');
		Schema::dropIfExists('department');
		Schema::dropIfExists('plan_coefficient');
		Schema::dropIfExists('norm');
		Schema::dropIfExists('bed_plan');
		Schema::dropIfExists('plan');
		Schema::dropIfExists('visit_numbers');
		Schema::dropIfExists('employee_position');

		Schema::dropIfExists('position');
		Schema::dropIfExists('funding_type');
		Schema::dropIfExists('employee_moonlighting');
		Schema::dropIfExists('employee_status');
			Schema::dropIfExists('employee');
		Schema::dropIfExists('employee_category');
				Schema::dropIfExists('state_schedule');
		Schema::dropIfExists('load_plan');
		Schema::dropIfExists('unit');
		Schema::dropIfExists('moonlighting');
		Schema::dropIfExists('hospital');
		Schema::dropIfExists('country');
		Schema::dropIfExists('city');
		Schema::dropIfExists('street');
	}

}
