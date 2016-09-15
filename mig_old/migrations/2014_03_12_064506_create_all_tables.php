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
		
		Schema::create('modules', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('name_module');
		});
		
		Schema::create('departments', function(Blueprint $table)
	{
		$table->increments('id');
		$table->string('department_name');
		$table->integer('module_id')->unsigned()->nullable();
		$table->foreign('module_id')->references('id')->on('modules')->onDelete('set null');
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
		$table->integer('department_id')->unsigned()->nullable();
		$table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
});
        
		Schema::create('password_reminders', function (Blueprint $table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
		
	Schema::create('plans', function($table)
	{
		$table->increments('id');
		$table->integer('treated_patients')->unsigned();
	    $table->integer('held_beddays')->unsigned();
		$table->integer('treatment_average_duration');
		$table->integer('bed_occupancy')->unsigned();
		$table->integer('beds_numbers')->unsigned();
		$table->integer('department_id')->unsigned()->nullable();
		$table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
	});
	
	Schema::create('bed_types', function(Blueprint $table)
	{
		$table->increments('id');
		$table->string('bed_types');
	});
	
	Schema::create('bed_numbers', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('beds_numbers')->unsigned();
		$table->integer('department_id')->unsigned()->nullable();
		$table->integer('bed_types')->unsigned()->nullable();
		$table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
		$table->foreign('bed_types')->references('id')->on('bed_types')->onDelete('set null');
	});
	
	
	Schema::create('beds', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('bed_numbers_facts');
		$table->integer('composed_at_beginning');
		$table->integer('received');
		$table->integer('written_out');
		$table->integer('died');
		$table->integer('department_id')->unsigned()->nullable();
		$table->date('date');
	    $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
	});
	
		Schema::create('queue', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('plan')->unsigned();
		$table->integer('wait_up_to_7_days')->unsigned();
		$table->integer('wait_8_14_days')->unsigned();
		$table->integer('wait_15_30_days')->unsigned();
		$table->integer('wait_more_than_30_days')->unsigned();
		$table->integer('department_id')->unsigned()->nullable();
	    $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
	});
	
			Schema::create('norm', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('bed_occupancy')->unsigned();
		$table->integer('average_treatment_duration')->unsigned();
		$table->integer('queue_hospitalizations')->unsigned();
		$table->integer('department_id')->unsigned()->nullable();
	    $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
	});
	
				Schema::create('values', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('treated_patients');
		$table->integer('held_beddays');
		$table->integer('average_occupancy_rate');
		$table->integer('average_occupancy_rate_at_yearend');
		$table->integer('average_treatment_duration');
		$table->integer('bed_turnovers');
		$table->integer('patiets_years');
		$table->integer('department_id')->unsigned()->nullable();
	    $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
	});
	
				Schema::create('norm_implementation', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('bed_occupancy');
		$table->integer('average_treatment_duration');
		$table->integer('value_id')->unsigned()->nullable();
	    $table->foreign('value_id')->references('id')->on('values')->onDelete('set null');
	});
	
				Schema::create('plan_implementation', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('treated_patients');
		$table->integer('held_beddays');
		$table->integer('average_treatment_duration');
		$table->integer('bed_occupancy');
		$table->integer('value_id')->unsigned()->nullable();
	    $table->foreign('value_id')->references('id')->on('values')->onDelete('set null');
	});
	
				Schema::create('funding_types', function(Blueprint $table)
	{
		$table->increments('id');
		$table->string('department_name');
	});
	
					Schema::create('loads_plans', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('visitation_in_year')->unsigned();
	});
	
					Schema::create('rates_states', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('rates_state')->unsigned();
	});
	
							Schema::create('staffings', function(Blueprint $table)
	{
		$table->increments('id');
		$table->double('occupied_posts')->unsigned();
		$table->double('individuals')->unsigned();
		$table->double('combining_coefficient')->unsigned();
	});

							Schema::create('staff_numbers', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('persons_in_decree_number')->unsigned();
		$table->integer('main_job')->unsigned();
		$table->integer('int_ext_plurality')->unsigned();
	});

					Schema::create('posts', function(Blueprint $table)
	{
		$table->increments('id');
		$table->string('post');
		$table->integer('staffing_id')->unsigned()->nullable();
	    $table->foreign('staffing_id')->references('id')->on('staffings')->onDelete('set null');
	    $table->integer('funding_types_id')->unsigned()->nullable();
	    $table->foreign('funding_types_id')->references('id')->on('funding_types')->onDelete('set null');
	    $table->integer('staff_number_id')->unsigned()->nullable();
	    $table->foreign('staff_number_id')->references('id')->on('staff_numbers')->onDelete('set null');
	    $table->integer('rates_state_id')->unsigned()->nullable();
	    $table->foreign('rates_state_id')->references('id')->on('rates_states')->onDelete('set null');
	    $table->integer('loads_plan_id')->unsigned()->nullable();
	    $table->foreign('loads_plan_id')->references('id')->on('loads_plans')->onDelete('set null');
	});
	


			Schema::create('staff', function(Blueprint $table)
	{
		$table->increments('id');
		$table->string('firstname');
		$table->string('lastname');
		$table->string('middlename');
		$table->boolean('decree');
		$table->integer('module_id')->unsigned()->nullable();
		$table->foreign('module_id')->references('id')->on('modules')->onDelete('set null');
		$table->integer('post_id')->unsigned()->nullable();
		$table->foreign('post_id')->references('id')->on('posts')->onDelete('set null');
	});
	
			Schema::create('plurality', function(Blueprint $table)
	{
		$table->increments('id');
		$table->double('plurality');
	    $table->integer('staff_id')->unsigned()->nullable();
	    $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
	    $table->integer('post_id')->unsigned()->nullable();
	    $table->foreign('post_id')->references('id')->on('posts')->onDelete('set null');
	});
			
			Schema::create('rates_fact', function(Blueprint $table)
	{
		$table->increments('id');
		$table->double('rates_fact');
	    $table->integer('staff_id')->unsigned()->nullable();
	    $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
	    $table->integer('post_id')->unsigned()->nullable();
	    $table->foreign('post_id')->references('id')->on('posts')->onDelete('set null');
	});	
	
				Schema::create('load', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('all_visits');
		$table->double('load_post');
		$table->double('load_year');
		$table->double('performing_load');
	    $table->integer('staff_id')->unsigned()->nullable();
	    $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
	    $table->integer('post_id')->unsigned()->nullable();
	    $table->foreign('post_id')->references('id')->on('posts')->onDelete('set null');
	});	
	
					Schema::create('specific_weight_visits', function(Blueprint $table)
	{
		$table->increments('id');
		$table->double('home');
		$table->double('disease');
		$table->double('preventive');
		$table->double('OMC');
		$table->double('budget');
		$table->double('paid');
		$table->date('date');
	    $table->integer('staff_id')->unsigned()->nullable();
	    $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
	});	
	
					Schema::create('visits_types_payment', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('OMC');
		$table->integer('budget');
		$table->integer('paid');
	    $table->integer('specific_weight_visits_id')->unsigned()->nullable();
	    $table->foreign('specific_weight_visits_id')->references('id')->on('specific_weight_visits')->onDelete('set null');
	});	
		
					Schema::create('clinic_visits', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('all');
		$table->integer('disease');
		$table->integer('preventive');
	    $table->integer('specific_weight_visits_id')->unsigned()->nullable();
	    $table->foreign('specific_weight_visits_id')->references('id')->on('specific_weight_visits')->onDelete('set null');
	});	

					Schema::create('home_visits', function(Blueprint $table)
	{
		$table->increments('id');
		$table->integer('all');
		$table->integer('disease');
		$table->integer('preventive');
	    $table->integer('specific_weight_visits_id')->unsigned()->nullable();
	    $table->foreign('specific_weight_visits_id')->references('id')->on('specific_weight_visits')->onDelete('set null');
	});	
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	
	{	Schema::dropIfExists('home_visits');
		Schema::dropIfExists('clinic_visits');
		Schema::dropIfExists('visits_types_payment');
		Schema::dropIfExists('specific_weight_visits');
		Schema::dropIfExists('load');
		Schema::dropIfExists('rates_fact');
		Schema::dropIfExists('plurality');
		Schema::dropIfExists('staff');
		Schema::dropIfExists('posts');
		Schema::dropIfExists('staff_numbers');
		Schema::dropIfExists('staffings');
		Schema::dropIfExists('rates_states');
		Schema::dropIfExists('loads_plans');
		Schema::dropIfExists('funding_types');
		Schema::dropIfExists('plan_implementation');
	    Schema::dropIfExists('norm_implementation');
		Schema::dropIfExists('values');
		Schema::dropIfExists('norm');
		Schema::dropIfExists('queue');
		Schema::dropIfExists('beds');
		Schema::dropIfExists('dates');
		Schema::dropIfExists('bed_numbers');
		Schema::dropIfExists('bed_types');
		Schema::dropIfExists('plans');
		Schema::drop('password_reminders');
		Schema::dropIfExists('users');
		Schema::dropIfExists('departments');
		Schema::dropIfExists('modules');





						
	}

}
