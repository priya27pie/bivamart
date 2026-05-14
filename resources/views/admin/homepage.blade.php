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
		<div class="card-title">Homepage </div>
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
    title: 'Homepage Updated!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
 	<form method="post" id="exampleValidation" action="{{route('submit.homepageedit',$homepage->id) }}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
    
      <div class="col-md-2">
            <label>1st slider(books)<span>*</span></label>
 <select  name="first_slider" class="form-control" required>
        <option value="">Sub Category(books)</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->first_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
          </div> 
    </div> 
    <h6>Latest Section </h6>
    <div class="form-group">

           <div class="col-md-4">
            <label>Latest Section title<span>*</span></label>
            <input type="text" class="form-control" name="latest_title" value="{{$homepage->latest_title}}" placeholder="Latest Section title">
             </div> 
            <div class="col-md-4">
            <label>Latest Section Big Title<span>*</span></label>
            <input type="text" class="form-control" name="latest_bigtitle" value="{{$homepage->latest_bigtitle}}"  placeholder="Latest Section Big Title">
             </div> 
               
            </div>      
           	    

		  <div class="form-group">
		      
        
           <div class="col-md-3"><label>Latest Section Video</label>
 <video controls="" muted="" loop="" id="myVideo" style="max-height: 100px;">
                <source src="{{ asset('uploads/'.$homepage->video) }}" type="video/mp4" >          
            </video>
                <input type="file" class="form-control" name="video">
      </div>  
<div class="col-md-2">
            <label>Slider Type<span>*</span></label>
   
 @php
                $slider_types = ['Books', 'Other Products'];
                                    @endphp        
                    <select name="latest_slider"  class="form-control" required>
                        <option value="">Choose</option>
                            @foreach($slider_types as $slider_type)
        <option value="{{ $slider_type }}" {{ $slider_type==$homepage->latest_type ? 'selected' : '' }}>
    {{ $slider_type }}</option>
                        @endforeach
                        
                    </select>

              </div>     

            <div class="col-md-2">
            <label>Latest slider<span>*</span></label>
   <select  name="latest_slider" class="form-control" >
        <option value="">Latest slider</option>
          @foreach($subcategories as $data)  
       <option value='{{$data->id}}' {{$data->id==$homepage->latest_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 

              </div>     


            </div>  
  <hr>
<div class="form-group">
              
         <div class="col-md-2">
            <label>2nd slider(books)</label>
          <select  name="second_slider" class="form-control" >
        <option value="">2nd slider</option>
          @foreach($subcategories as $data)  
       <option value='{{$data->id}}' {{$data->id==$homepage->second_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div> 
   </div> 
  <h6>Category Section </h6>
  <div class="form-group">
          <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory1" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_other as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->homecategory1 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 1<span>*</span></label>
            <img src="{{ asset('uploads/'.$homepage->category_image1) }}" width="150">
         <input type="file" class="form-control" name="category_image1">

             </div>  
    <div class="col-md-4"><label>Image 1 Link<span>*</span></label>
         <input type="text" class="form-control" name="image1_link" value="{{$homepage->image1_link}}"  placeholder="Image 1 Link ">

             </div>  
    </div> 

<div class="form-group">
     <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory2" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_other as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->homecategory2 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 2<span>*</span></label>
    <img src="{{ asset('uploads/'.$homepage->category_image2) }}" width="150">
     <input type="file" class="form-control" name="category_image2">

             </div>  
    <div class="col-md-4"><label>Image 2 Link<span>*</span></label>
         <input type="text" class="form-control" name="image2_link" value="{{$homepage->image2_link}}"  placeholder="Image 2 Link ">

             </div>  
            </div>  

<div class="form-group">
     <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory3" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_other as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->homecategory3 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 3<span>*</span></label>
              <img src="{{ asset('uploads/'.$homepage->category_image3) }}" width="150">
         <input type="file" class="form-control" name="category_image3" placeholder="Video ">

             </div>  
    <div class="col-md-4"><label>Image 3 Link<span>*</span></label>
         <input type="text" class="form-control" name="image3_link" value="{{$homepage->image3_link}}"  placeholder="Image 3 Link ">

             </div>  
            </div>  
<div class="form-group">
     <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory4" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_other as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->homecategory4 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 4<span>*</span></label>
               <img src="{{ asset('uploads/'.$homepage->category_image4) }}" width="150">
                <input type="file" class="form-control" name="category_image4" >

             </div>  
    <div class="col-md-4"><label>Image 4 Link<span>*</span></label>
         <input type="text" class="form-control" name="image4_link" value="{{$homepage->image4_link}}"  placeholder="Image 4 Link  ">

             </div>  
            </div>  
<div class="form-group">
     <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory5" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_other as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->homecategory5 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 5<span>*</span></label>
                  <img src="{{ asset('uploads/'.$homepage->category_image5) }}" width="150">
              <input type="file" class="form-control" name="category_image5" >

             </div>  
    <div class="col-md-4"><label>Image 5 Link<span>*</span></label>

         <input type="text" class="form-control" name="image5_link" value="{{$homepage->image5_link}}"  placeholder="Image 5 Link">

             </div>  
            </div>  

<div class="form-group">
 
           <div class="col-md-6"><label>Choose Category Video</label><br>
         <video controls="" muted="" loop="" id="myVideo" style="max-height: 100px;">
                <source src="{{ asset('uploads/'.$homepage->category_video) }}" type="video/mp4" >          
            </video>

         <input type="file" class="form-control" name="category_video">

             </div>  
   
            </div> 
<div class="form-group">

    
      <div class="col-md-2">
            <label>3rd slider(Non-Book)<span>*</span></label>
 <select  name="third_slider" class="form-control" required>
        <option value="">Sub Category(books)</option>
          @foreach($subcategory_other as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->third_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
          </div> 

          <div class="col-md-2">
            <label>4th slider(Non-Book)<span>*</span></label>
 <select  name="fourth_slider" class="form-control" >
        <option value="">Sub Category(books)</option>
          @foreach($subcategory_other as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->fourth_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
          </div> 
          <div class="col-md-2">
            <label>5th slider(Non-Book)<span>*</span></label>
 <select  name="fifth_slider" class="form-control" >
        <option value="">Sub Category(books)</option>
          @foreach($subcategory_other as $data)  
       <option value="{{$data->id}}" {{$data->id==$homepage->fifth_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
          </div> 
    </div> 
    
		<div class="card-action">
			<div class="row">
				<div class="col-md-12">
					<input class="btn btn-success" type="submit" name="sub" value="Submit">
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