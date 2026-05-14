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
		<div class="card-title">Bookpage </div>
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
    title: 'Bookpage Updated!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
 	<form method="post" id="exampleValidation" action="{{route('submit.bookpageedit',$bookpage->id) }}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
     
        	<div class="form-group">
    
          
      <div class="col-md-2">
            <label>1st slider<span>*</span></label>
 <select  name="first_slider" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategories as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->first_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
          </div> 
    </div> 
     <h6>Latest Section </h6>
         <div class="form-group">

           <div class="col-md-4">
            <label>Latest Section title<span>*</span></label>
            <input type="text" class="form-control" name="latest_title" value="{{$bookpage->latest_title}}" placeholder="Latest Section title">
             </div> 
            <div class="col-md-4">
            <label>Latest Section Big Title<span>*</span></label>
            <input type="text" class="form-control" name="latest_bigtitle" value="{{$bookpage->latest_bigtitle}}"  placeholder="Latest Section Big Title">
             </div> 
               
            </div>      

		  <div class="form-group">
		      
        
           <div class="col-md-3"><label>Latest Section Video</label>
 <video controls="" muted="" loop="" id="myVideo" style="max-height: 100px;">
                <source src="{{ asset('uploads/'.$bookpage->video) }}" type="video/mp4" >          
            </video>
                <input type="file" class="form-control" name="video">
      </div>  
            <div class="col-md-2">
            <label>Latest slider<span>*</span></label>
   <select  name="latest_slider" class="form-control" >
        <option value="">Latest slider</option>
          @foreach($subcategories as $data)  
       <option value='{{$data->id}}' {{$data->id==$bookpage->latest_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 

              </div>     
          </div>     
<div class="form-group">
 <div class="col-md-2">
            <label>2nd slider</label>
          <select  name="second_slider" class="form-control" >
        <option value="">2nd slider</option>
          @foreach($subcategories as $data)  
       <option value='{{$data->id}}' {{$data->id==$bookpage->second_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div> 

            </div>  
  <h6>Category Section </h6>
  <div class="form-group">
          <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory1" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->homecategory1 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 1<span>*</span></label>
            <img src="{{ asset('uploads/'.$bookpage->category_image1) }}" width="150">
         <input type="file" class="form-control" name="category_image1">

             </div>  
    <div class="col-md-4"><label>Image 1 Link<span>*</span></label>
         <input type="text" class="form-control" name="image1_link" value="{{$bookpage->image1_link}}"  placeholder="Image 1 Link ">

             </div>  
    </div> 

<div class="form-group">
     <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory2" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->homecategory2 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 2<span>*</span></label>
    <img src="{{ asset('uploads/'.$bookpage->category_image2) }}" width="150">
     <input type="file" class="form-control" name="category_image2">

             </div>  
    <div class="col-md-4"><label>Image 2 Link<span>*</span></label>
         <input type="text" class="form-control" name="image2_link" value="{{$bookpage->image2_link}}"  placeholder="Image 2 Link ">

             </div>  
            </div>  

<div class="form-group">
     <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory3" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->homecategory3 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 3<span>*</span></label>
              <img src="{{ asset('uploads/'.$bookpage->category_image3) }}" width="150">
         <input type="file" class="form-control" name="category_image3" placeholder="Video ">

             </div>  
    <div class="col-md-4"><label>Image 3 Link<span>*</span></label>
         <input type="text" class="form-control" name="image3_link" value="{{$bookpage->image3_link}}"  placeholder="Image 3 Link ">

             </div>  
            </div>  
<div class="form-group">
     <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory4" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->homecategory4 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 4<span>*</span></label>
               <img src="{{ asset('uploads/'.$bookpage->category_image4) }}" width="150">
                <input type="file" class="form-control" name="category_image4" >

             </div>  
    <div class="col-md-4"><label>Image 4 Link<span>*</span></label>
         <input type="text" class="form-control" name="image4_link" value="{{$bookpage->image4_link}}"  placeholder="Image 4 Link  ">

             </div>  
            </div>  
<div class="form-group">
     <div class="col-md-2"><label>Choose Subcategory<span>*</span></label>
           <select  name="homecategory5" class="form-control" required>
        <option value="">Sub Category</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->homecategory5 ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>    
           <div class="col-md-4"><label>Choose Category Image 5<span>*</span></label>
                  <img src="{{ asset('uploads/'.$bookpage->category_image5) }}" width="150">
              <input type="file" class="form-control" name="category_image5" >

             </div>  
    <div class="col-md-4"><label>Image 5 Link<span>*</span></label>

         <input type="text" class="form-control" name="image5_link" value="{{$bookpage->image5_link}}"  placeholder="Image 5 Link">

             </div>  
            </div>  

<div class="form-group">
 
           <div class="col-md-6"><label>Choose Category Video</label><br>
         <video controls="" muted="" loop="" id="myVideo" style="max-height: 100px;">
                <source src="{{ asset('uploads/'.$bookpage->category_video) }}" type="video/mp4" >          
            </video>

         <input type="file" class="form-control" name="category_video">

             </div>  
   
            </div> 
            <h6>Author Section</h6>
<div class="form-group">

    
      <div class="col-md-2">
            <label>3rd slider(Non-Book)<span>*</span></label>
 <select  name="third_slider" class="form-control" required>
        <option value="">Sub Category(books)</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->third_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
          </div> 

          <div class="col-md-2">
            <label>4th slider(Non-Book)<span>*</span></label>
 <select  name="fourth_slider" class="form-control" >
        <option value="">Sub Category(books)</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->fourth_slider ? 'selected': ''}}>{{$data->name}}</option>
      
        @endforeach
          </select> 
          </div> 
          <div class="col-md-2">
            <label>5th slider(Non-Book)<span>*</span></label>
 <select  name="fifth_slider" class="form-control" >
        <option value="">Sub Category(books)</option>
          @foreach($subcategory_book as $data)  
       <option value="{{$data->id}}" {{$data->id==$bookpage->fifth_slider ? 'selected': ''}}>{{$data->name}}</option>
      
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