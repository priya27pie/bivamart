@extends('admin.layouts.main')
@section('middle')

<style>
    
    .col-md-5,.col-md-4,.col-md-3,.col-md-2{
        display:inline-block !important;
    }
</style>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'brand has been updated!',
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
		<div class="card-title">Edit Brand</div>
	</div>

 <form method="post" id="exampleValidation" action="{{route('submit.edit_brand', $brand->id)}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
            <div class="col-md-3">
            <label>Brand Name<span>*</span></label>
            <input type="text" class="form-control" name="name" value="{{$brand->name}}" placeholder="Author Name">
             </div> 

         <div class="col-md-3">
            <label>Location</label>
               <input type="text" class="form-control" name="location" value="{{$brand->location}}" placeholder="Location">

             </div>
              <div class="col-md-3">
            <label>Phone</label>
        <input type="text" class="form-control" name="phone" value="{{$brand->phone}}" placeholder="Phone">

             </div>
                
            </div>        
     
          
           <div class="col-md-3"><label>Picture <span>*</span></label>

                <img src="{{ asset('uploads/'.$brand->picture)}}" width="100px"> 
                        <input type="file" class="form-control" name="picture" >

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


					
 

			</div></div>
			</div>
			</div>
		
	@endsection