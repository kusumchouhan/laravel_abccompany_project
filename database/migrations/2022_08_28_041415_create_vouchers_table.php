<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->smallInteger('customer_id')->default('0');
            $table->smallInteger('is_active')->default('1');
            $table->timestamps();
        });

        // Insert some stuff
    	DB::table('vouchers')->insert([
		['name' => 'voucher1', 'price' => 50,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher2', 'price' => 90,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher3', 'price' => 50,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher4', 'price' => 70,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher5', 'price' => 54,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher6', 'price' => 8,'customer_id' =>0,'is_active' => 1],
		['name' => 'voucher7', 'price' => 20,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher8', 'price' => 15,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher9', 'price' => 40,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher10', 'price' => 50,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher11', 'price' => 15,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher12', 'price' => 17,'customer_id' =>0,'is_active' => 1],
		['name' => 'voucher13', 'price' => 40,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher14', 'price' => 50,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher15', 'price' => 18,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher16', 'price' => 20,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher17', 'price' => 30,'customer_id' =>0,'is_active' => 1],
                ['name' => 'voucher18', 'price' => 40,'customer_id' =>0,'is_active' => 1],
	]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
