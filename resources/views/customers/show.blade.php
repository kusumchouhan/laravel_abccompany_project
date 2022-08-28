@extends('layouts.app')

@section('content')
<div class="container">
	<div class="voucher_div mt-5 p-5">
                <div class="vou_title">Congratulations</div>
                <div class="d-flex justify-content-between mt-5">
		<div class="cus_name">Customer : {{ $voucherdata->first_name}} {{ $voucherdata->last_name}}</div>
		 <div class="vou_detail">
                    <div class="vou_name">Voucher Code : {{ $voucherdata->voucher->name}}</div>
                    <div class="vou_price">Price : ${{ $voucherdata->voucher->price}}</div>
                 </div>   
                 <div>              
         </div>
</div>
@endsection
