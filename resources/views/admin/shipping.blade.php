@extends('admin.layouts.main')
@section('middle')
dd($validated);
<style>
    
    .col-md-6,.col-md-5,.col-md-4,.col-md-3,.col-md-2{
        display:inline-block !important;
    }
</style>
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="card-title">Delivery Charges </div>
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

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Shipping Updated!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
 	<form method="post" id="exampleValidation" action="{{route('submit.shippingEdit',$shipping->id) }}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
    
        	<div class="form-group">      
      <div class="col-md-4">
            <label>City Next Per 500 Grams Charge</label>
            <input type="text" class="form-control" name="citybase_next" value="{{$shipping->citybase_next}}" placeholder="City Next Per 500 Grams Charge">

          </div>        
      <div class="col-md-4">
            <label>City Base Charge</label>
            <input type="text" class="form-control" name="citybase" value="{{$shipping->citybase}}" placeholder="City Base Charge">

          </div> 
           </div> 
    <div class="form-group">      
      <div class="col-md-4">
            <label>State Next Per 500 Grams Charge</label>
            <input type="text" class="form-control" name="statebase_next" value="{{$shipping->statebase_next}}" placeholder="State Next Per 500 Grams Charge">

          </div> 
        
      <div class="col-md-4">
            <label>State Base Charge</label>
            <input type="text" class="form-control" name="statebase" value="{{$shipping->statebase}}" placeholder="State Base Charge">

          </div> 

    </div> 
<div class="form-group">      
      <div class="col-md-4">
            <label>Country Next Per 500 Grams Charge</label>
            <input type="text" class="form-control" name="countrybase_next" value="{{$shipping->countrybase_next}}" placeholder="Country Next Per 500 Grams Charge">

          </div> 
        
      <div class="col-md-4">
            <label>Country Base Charge</label>
            <input type="text" class="form-control" name="countrybase" value="{{$shipping->countrybase}}" placeholder="Country Base Charge">

          </div> 
          
    </div> 
<div class="form-group">      
      <div class="col-md-4">
            <label>Special Pincode Next Per 500 Grams Charge</label>
            <input type="text" class="form-control" name="spclpincode_nxt" value="{{$shipping->spclpincode_nxt}}" placeholder="Special Pincode Next Per 500 Grams Charge">

          </div> 
        
      <div class="col-md-4">
            <label>Special Pincode Base Charge</label>
            <input type="text" class="form-control" name="spclpincode_base" value="{{$shipping->spclpincode_base}}" placeholder="Special Pincode Base Charge">

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

@endsection