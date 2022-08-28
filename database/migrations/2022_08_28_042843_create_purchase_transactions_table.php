<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id');
            $table->bigInteger('product_id');
            $table->decimal('total_spent', 10, 2);
            $table->decimal('total_saving', 10, 2);              
            $table->timestamp('transaction_at');
        });

        // Insert some stuff
    	DB::table('purchase_transactions')->insert([
		['customer_id' => 1, 'product_id' => 1, 'total_spent' => 50.33, 'total_saving' => 2.12, 'transaction_at' => '2022-08-01 07:58:56'],
                ['customer_id' => 2, 'product_id' => 1, 'total_spent' => 90.78, 'total_saving' => 0.70, 'transaction_at' => '2022-08-02 14:17:56'],
                ['customer_id' => 3, 'product_id' => 3, 'total_spent' => 50.44, 'total_saving' => 4.90, 'transaction_at' => '2022-08-04 12:34:56'],
                ['customer_id' => 4, 'product_id' => 2, 'total_spent' => 70.45, 'total_saving' => 7.70, 'transaction_at' => '2022-08-06 07:58:56'],
                ['customer_id' => 5, 'product_id' => 5, 'total_spent' => 54.67, 'total_saving' => 0.10, 'transaction_at' => '2022-08-09 12:34:56'],
                ['customer_id' => 6, 'product_id' => 1, 'total_spent' => 8.00,  'total_saving' => 1.00, 'transaction_at' => '2022-08-11 12:34:56'],
		['customer_id' => 1, 'product_id' => 4, 'total_spent' => 20.93, 'total_saving' => 2.12, 'transaction_at' => '2022-08-11 14:17:56'],
                ['customer_id' => 2, 'product_id' => 1, 'total_spent' => 15.80, 'total_saving' => 0.70, 'transaction_at' => '2022-08-12 07:58:56'],
                ['customer_id' => 3, 'product_id' => 2, 'total_spent' => 40.50, 'total_saving' => 4.90, 'transaction_at' => '2022-08-13 12:34:56'],
                ['customer_id' => 4, 'product_id' => 4, 'total_spent' => 50.00, 'total_saving' => 7.70, 'transaction_at' => '2022-08-15 12:34:56'],
                ['customer_id' => 5, 'product_id' => 1, 'total_spent' => 15.67, 'total_saving' => 0.10, 'transaction_at' => '2022-08-17 12:34:56'],
                ['customer_id' => 6, 'product_id' => 2, 'total_spent' => 17.00, 'total_saving' => 1.00, 'transaction_at' => '2022-08-18 14:17:56'],
		['customer_id' => 1, 'product_id' => 3, 'total_spent' => 40.33, 'total_saving' => 2.12, 'transaction_at' => '2022-08-20 12:34:56'],
                ['customer_id' => 2, 'product_id' => 5, 'total_spent' => 50.78, 'total_saving' => 0.70, 'transaction_at' => '2022-08-24 07:58:56'],
                ['customer_id' => 3, 'product_id' => 2, 'total_spent' => 18.44, 'total_saving' => 4.90, 'transaction_at' => '2022-08-25 02:34:56'],
                ['customer_id' => 4, 'product_id' => 1, 'total_spent' => 20.45, 'total_saving' => 7.70, 'transaction_at' => '2022-08-26 10:34:56'],
                ['customer_id' => 5, 'product_id' => 3, 'total_spent' => 30.67, 'total_saving' => 0.10, 'transaction_at' => '2022-08-27 04:34:56'],
                ['customer_id' => 6, 'product_id' => 4, 'total_spent' => 40.00, 'total_saving' => 1.00, 'transaction_at' => '2022-08-27 06:34:56'],
	]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_transactions');
    }
}
