<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          // checking customer eligibility and get random customer
          $currentTime = Carbon::now();
          $endDate = $currentTime->toDateTimeString(). PHP_EOL;
          $startDate = $currentTime->subDays(30);

          $vaildCustomer = Voucher::whereNotNull('customer_id')->get()->pluck('customer_id')->toArray();
           
          $customers = DB::table('customers')
                       ->select('purchase_transactions.customer_id',DB::raw('SUM(purchase_transactions.total_spent) as total_price')) 
                       ->join('purchase_transactions', 'customers.id', '=', 'purchase_transactions.customer_id')
                       ->groupBy('purchase_transactions.customer_id')
                       ->having('total_price' ,'>', '100')
                       ->whereBetween('purchase_transactions.transaction_at', [$startDate, $endDate])
                       ->whereNotIn('customers.id', $vaildCustomer)
                       //->toSql();
                       ->inRandomOrder()->first();

          if (isset($customers->customer_id)) 
	  {
               // Get random voucher
            	$voucher = Voucher::where('is_active',1)->where('customer_id', 0)->inRandomOrder()->first();  
               // lock the voucher
               Voucher::where("id", $voucher->id)->update(['customer_id' => $customers->customer_id,'is_active' => 0]);

                return redirect('/voucher/'.$voucher->id);
          }
	  else
	  { 
          	return view('customers.index');
          } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
         $voucherdata = Customer::where('id',$customer->id)->with('voucher')->first();
          //dd($voucherdata);
         return view('customers.show',['voucherdata' => $voucherdata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
