@extends('layouts.app')

@section('content')
<div class="container main_div">
	<div class="title m-b-md">
		 <div>ANNIVERSARY celebration</div>
		 <div>campaign</div>                 
         </div>
         <div class="celtext mb-4">Upload your image with company product and win cash voucher.</div>   
	 <div>
            <a href="{{ route('customer') }}" class="button">Click me</a>
        </div>
</div>
@endsection
