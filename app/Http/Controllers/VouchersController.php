<?php

namespace App\Http\Controllers;

use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.index');
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
        //$data = request()->validate(['voucher' =>'required','customer' =>'required','image'=>'required|image' ]);
        
        // upload customer image and check 
        if($request->hasFile('image'))
        {
		$imagepath = request('image')->store('uploads','public');
		
		if(isset($imagepath) && !empty($request->input('customer')))
		 {
		    return redirect('/customer/'.$request->input('customer'));
		 }	 
		 else
		 {
		    //dd($request->all());
		    return view('customers.index');
		 }
        }
        else
        {
           Voucher::where("id", $request->input('voucher'))->update(['customer_id' => 0,'is_active' => 1]);
           return view('customers.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
       // show upload image page with customer and voucher id
       return view('vouchers.show',compact('voucher'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
