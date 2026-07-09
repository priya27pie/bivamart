@extends('admin.layouts.main')
@section('middle')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    
    .col-md-6,.col-md-5,.col-md-4,.col-md-3,.col-md-2{
        display:inline-block !important;
    }
</style>
<script>
$(document).ready(function () {

    $('#product_type').on('change', function () {

        var type = $(this).val();

        $.ajax({
            url: "{{ route('one-rupee.products') }}",
            type: "GET",
            data: {
                type: type
            },
            success: function (res) {
                console.log(res);
               // alert("Success");
                $('#product_id').html(res.options);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });

    });

});
</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'one rupees Addded!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="card-title">Add ₹1 Product</div>
	</div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif
 	<form method="post" id="exampleValidation" action="{{route('submit.oneRupeesProduct')}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
             <div class="col-md-2">
           <select name="product_type" id="product_type" class="form-control">
    <option value="">Select Type</option>
    <option value="book">Book</option>
    <option value="other">Other Product</option>
</select>
             </div>
         <div class="col-md-4">
        <select name="product_id" id="product_id" class="form-control">
            <option value="">Select Product</option>
        </select>
    </div>  
       
    <label for="name" class="col-lg-1 col-md-1 col-sm-4 mt-sm-2 "> Stock <span class="required-label">*</span></label>
      <div class="col-md-2">    
       <input type="text" name="stock" placeholder="Stock" class="form-control" required>

    </div>     
            </div>   	    

		  
        
		<div class="card-action">
			<div class="row">
				<div class="col-md-12">
					<input class="btn btn-success" type="submit" name="sub" value="Submit">
				</div>										
			</div>
		</div>
</div>
	</form>




</div>	
					</div>
				</div>
			</div>
			
		</div>

@endsection