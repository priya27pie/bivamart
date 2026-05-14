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
		<div class="card-title">Edit Slider</div>
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
    title: 'Banner Updated!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
 	<form method="post" id="exampleValidation" action="{{route('submit.edit_slider',$banners->id) }}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
    
          
      <div class="col-md-5">
            <label>Link<span>*</span></label>
			<input type="text" class="form-control" value="{{$banners->link}}" name="link" placeholder="Link">
             </div> 

           <div class="col-md-3">
            <label>Place</label>
      <select name="place" class="form-control" required>
    <option value="">Choose</option>

    <option value="banner" {{ $banners->place == 'banner' ? 'selected' : '' }}>
        Homepage Top Slider
    </option>

    <option value="bookbanner" {{ $banners->place == 'bookbanner' ? 'selected' : '' }}>
        Bookpage Top Slider
    </option>

    <option value="latest_home" {{ $banners->place == 'latest_home' ? 'selected' : '' }}>
        Latest Section Home Page
    </option>

    <option value="latest_book" {{ $banners->place == 'latest_book' ? 'selected' : '' }}>
        Latest Section Book Page
    </option>
</select>  
             </div>
               
            </div>   	    

		  <div class="form-group">
		      
        
           <div class="col-md-3"><label>Picture <span>*</span></label>
               <img src="{{ asset('uploads/'.$banners->picture)}}" style="max-height:60px"> 
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