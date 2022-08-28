@extends('layouts.app')

@section('content')
<div class="container">
       
	<div class="row">
        	<div class="col-10">
                        <div class="mb-5">
			    <div class="vou_title">Voucher Code : {{ $voucher->id }}</div>
			    <div class="vou_title">Customer id : {{ $voucher->customer_id }}</div>			       
		        </div>
			<form method="post" action="/voucher" enctype="multipart/form-data" id="vouherreedem">
				 @csrf
		                <div class="form-group">
                                        <input type="hidden" value="{{ $voucher->id }}" name="voucher" id="voucher">
                                        <input type="hidden" value="{{ $voucher->customer_id }}" name="customer" id="customer">
					<div class="file-upload">
						  <button class="file-upload-btn btn btn-outline-light text-dark" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Upload your image with company product</button>

						  <div class="image-upload-wrap">
							    <input class="file-upload-input" name="image" id="image" type='file' onchange="readURL(this);" accept="image/*" />
							    <div class="drag-text">
							      <h3>Drag and drop a file or select add Image</h3>
							    </div>
						  </div>
						  <div class="file-upload-content">
							    <img class="file-upload-image" src="#" alt="your image" />
							    <div class="image-title-wrap">
							      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
							    </div>
						  </div>
					</div>
                                       @error('image')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror

		                </div>

		                <div class="form-group mt-5">
		                    
		                        <button type="submit" class="btn btn-outline-danger btn-block">
		                            Submit
		                        </button>
		                    
		                </div>
			</form>
		</div>
                <div class="col-2"><div id="divCounter"></div></div>
        </div>
</div>
@endsection
<script>
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
</script>
