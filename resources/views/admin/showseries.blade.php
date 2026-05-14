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
    title: 'Series has been updated!',
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
		<div class="card-title">Edit Series</div>
	</div>

 <form method="post" id="exampleValidation" action="{{route('submit.edit_series', $series->id)}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
            <div class="col-md-3">
            <label>Author Name<span>*</span></label>
            <input type="text" class="form-control" name="name" value="{{$series->name}}" placeholder="Author Name">
             </div> 

           <div class="col-md-4">
            <label>Link</label>
               <input type="text" class="form-control" name="link" value="{{$series->link}}" placeholder="Please give series url">

             </div>
               
     
          
           <div class="col-md-3"><label>Picture <span>*</span></label>

                <img src="{{ asset('uploads/'.$series->picture)}}" width="100px"> 
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