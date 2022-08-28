<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
	    $table->string('first_name');
            $table->string('last_name');
            $table->string('gender', 50);
            $table->string('contact_number', 50);
            $table->date('date_of_birth');
	    $table->string('email')->unique();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        
        // Insert some stuff
    	DB::table('customers')->insert([
		['first_name' => 'demo1', 'last_name' => 'customer', 'gender' => 'female', 'contact_number' => '123456784', 'date_of_birth' => '1980-01-22', 'email' => 'demo1@example.com'],
                ['first_name' => 'demo2', 'last_name' => 'customer', 'gender' => 'male', 'contact_number' => '465465665', 'date_of_birth' => '1984-10-12', 'email' => 'demo2@example.com'],
                ['first_name' => 'demo3', 'last_name' => 'customer', 'gender' => 'female', 'contact_number' => '534546546', 'date_of_birth' => '1990-07-08', 'email' => 'demo3@example.com'],
                ['first_name' => 'demo4', 'last_name' => 'customer', 'gender' => 'male', 'contact_number' => '246577897', 'date_of_birth' => '1983-09-30', 'email' => 'demo4@example.com'],
                ['first_name' => 'demo5', 'last_name' => 'customer', 'gender' => 'female', 'contact_number' => '15794e4360', 'date_of_birth' => '1987-11-18', 'email' => 'demo5@example.com'],
                ['first_name' => 'demo6', 'last_name' => 'customer', 'gender' => 'male', 'contact_number' => '34235345435', 'date_of_birth' => '1981-02-01', 'email' => 'demo6@example.com']
	]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
