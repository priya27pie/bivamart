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
		<div class="card-title">Edit Publisher</div>
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
    title: 'Publisher Addded!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
 	<form method="post" id="exampleValidation" action="{{route('submit.edit_publisher', $publishers->id)}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
    
          
      <div class="col-md-4">
            <label>Publisher Name<span>*</span></label>
			<input type="text" class="form-control" name="name" value="{{$publishers->name}}" placeholder="Publisher Name">
             </div> 

           <div class="col-md-4">
            <label>Email</label>
               <input type="text" class="form-control" name="email" value="{{$publishers->email}}"  placeholder="Email">

             </div>
              <div class="col-md-3">
            <label>Phone</label>
               <input type="text" class="form-control" name="phone" value="{{$publishers->phone}}" placeholder="Phone">

             </div>
                
            </div>           
           <div class="col-md-3"><label>Picture <span>*</span></label>
                 <img src="{{ asset('uploads/'.$publishers->picture)}}" width="100px"> 
                        <input type="file" class="form-control" name="picture" placeholder="Publisher ">
             </div>  
              

            </div>   

     
			<div class="form-group form-show-validation row">
				<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 "> Address <span class="required-label">*</span></label>
				<div class="col-lg-12 col-md-12 col-sm-12">
    <textarea name="description" class="form-control"  rows="10">{{$publishers->description}}</textarea>
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