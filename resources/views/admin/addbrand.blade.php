@extends('admin.layouts.main')
@section('middle')

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
		<div class="card-title">Add Brand</div>
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
    title: 'Brand Added!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
 	<form method="post" id="exampleValidation" action="{{route('submit.insertbrand')}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
    
          
      <div class="col-md-4">
            <label>Brand Name<span>*</span></label>
			<input type="text" class="form-control" name="name" placeholder="Brand Name">
             </div> 

           <div class="col-md-3">
            <label>Location</label>
               <input type="text" class="form-control" name="location" placeholder="Location">

             </div>
              <div class="col-md-3">
            <label>Phone</label>
               <input type="text" class="form-control" name="phone" placeholder="Phone">

             </div>
                
            </div>           
           <div class="col-md-3"><label>Picture <span>*</span></label>
                        <input type="file" class="form-control" name="picture" placeholder="Publisher ">

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