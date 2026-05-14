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
		<div class="card-title">Add Author</div>
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
    title: 'Author Addded!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
 	<form method="post" id="exampleValidation" action="{{route('submit.insertauthor')}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
    
          
      <div class="col-md-5">
            <label>Author Name<span>*</span></label>
			<input type="text" class="form-control" name="author" placeholder="Author Name">
             </div> 

           <div class="col-md-3">
            <label>Email</label>
               <input type="email" class="form-control" name="email" placeholder="Email">

             </div>
               
            </div>   	    

		  <div class="form-group">
		      
          <div class="col-md-3"><label>DOB</label>
             			<input type="date" class="form-control" name="dob" placeholder="Series Name">

             </div>
                 <div class="col-md-3"><label>Sex</label>
             			
                    <select class="form-control" name="sex" >
                        <option value="">Choose</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>

                    </select>

             </div>
           <div class="col-md-3"><label>Picture <span>*</span></label>
                        <input type="file" class="form-control" name="picture" placeholder="Publisher ">

             </div>  
              

            </div>   

        
   

			<div class="form-group form-show-validation row">
				<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 "> Description </label>
				<div class="col-lg-12 col-md-12 col-sm-12">
            	    <textarea name="description" class="form-control"  rows="10"></textarea>
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