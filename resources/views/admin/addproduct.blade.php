@extends('admin.layouts.main')
@section('middle')
<script>
$(document).ready(function() {

    $(document).on('change', '#category', function() {

    //    console.log('Changed'); // 👈 now it WILL fire

        var category_id = $(this).val();
       // alert(category_id);
        if(category_id) {

            $.ajax({
                url: "{{ url('admin/get-subcategories') }}/" + category_id,
                type: "GET",
                success: function(data) {

                    $('#subcategory').html('<option value="">Select Subcategory</option>');

                    $.each(data, function(key, value) {
                        $('#subcategory').append(
                            `<option value="${value.id}">${value.name}</option>`
                        );
                    });

                }
            });

        } else {
            $('#subcategory').html('<option value="">Select Subcategory</option>');
        }

    });

});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<style>
    
    .col-md-6,.col-md-5,.col-md-4,.col-md-3,.col-md-2{
        display:inline-block !important;
    }
</style>
<script>
$(document).ready(function() {
    $('.select2').select2({
        allowClear: true
    });
});
</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Book Addded!',
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
		<div class="card-title">Add Product</div>
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
 	<form method="post" id="exampleValidation" action="{{route('submit.insertproduct')}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
             <div class="col-md-3">
            <label>Product Category</label>
		
         <select  name="category" id="category" class="form-control" required>
        <option value="">Category</option>
          @foreach($categories as $data)  
       <option value='{{$data->id}}'>{{$data->category}}</option>
      
        @endforeach
          </select> 
       
             </div>
            <div class="col-md-3">
              <label>Product Subcategory</label>   
    <select name="subcategories[]" multiple id="subcategory" class="form-control select2">
    <option value="">Select Subcategory</option>
</select>
            </div> 
          
      <div class="col-md-5">
            <label>Product Title</label>
			<input type="text" class="form-control" name="title" placeholder="Title">
             </div> 

        
            </div>   	    

		  <div class="form-group">
		      <div class="col-md-3">
            <label>Author</label>
        <select name="author"  class="form-control select2">
    <option value="">Select Author</option>
    @foreach($authors as $author)
        <option value="{{ $author->id }}">
            {{ $author->author }}
        </option>
    @endforeach
</select>
             </div>
                  
          <div class="col-md-3"><label>Series Name</label>
 <select name="series"  class="form-control">
    <option value="">Select series</option>
    @foreach($series as $data)
        <option value="{{ $data->id }}">
            {{ $data->name }}
        </option>
    @endforeach
</select>


             </div>
                 <div class="col-md-2"><label>Language</label>

 <select name="language" class="form-control select2">
    <option value="">Select Language</option>
    @foreach($languages as $language)
        <option value="{{ $language->language_name }}">
            {{ $language->language_name }}
        </option>
    @endforeach
</select>


             </div>
           <div class="col-md-3"><label>Publisher </label>
   <select name="publisher" class="form-control select2">
    <option value="">Select Publisher</option>
    @foreach($publishers as $publisher)
        <option value="{{ $publisher->id }}">
            {{ $publisher->name }}
        </option>
    @endforeach
</select>
             </div>  
             

            </div>   

          <div class="form-group">
             <div class="col-md-3"><label>Published on </label>
           <input type="date" class="form-control" name="published_on" placeholder="Published on ">

             </div>    
          <div class="col-md-3"><label>No. of Pages</label>
                        <input type="text" class="form-control" name="no_of_pages" placeholder="No. of Pages">

             </div>
                 <div class="col-md-2"><label>Binding </label>
                        <input type="text" class="form-control" name="binding" placeholder="Binding">

             </div>
           <div class="col-md-3"><label>Edition  </label>
                        <input type="text" class="form-control" name="edition" placeholder="Edition  ">

             </div>  
           
            </div>     
    <div class="form-group">
          <div class="col-md-3"><label>Illustrations</label>
     <input type="text" class="form-control" name="illustrations" placeholder="Illustrations">

             </div>   

        <div class="col-md-3"><label>ISBN </label>
          <input type="text" class="form-control" name="isbn" placeholder="ISBN ">

             </div>   
             <div class="col-md-2">
            <label>Product Price</label>
            <input type="text" class="form-control" name="price" placeholder="Product Price">
             </div>
        <div class="col-md-3">
            <label>Product Discounted Price</label>
            <input type="text" class="form-control" name="discounted_price" placeholder="Product Discounted Price">
             </div>
      
            </div>   
  <div class="form-group">
  <div class="col-md-3"><label>Age Group </label>
          <select class="form-control select2" name="age[]" multiple>
              <option value="">Choose Age</option>
              <option value="0-2">0-2</option>
              <option value="3-5">3-5</option>
              <option value="6-8">6-8</option>
              <option value="9-12">9-12</option>
              <option value="13-18">Young Adult</option>
              <option value="18+">Adult</option>

          </select>

             </div>  
 <div class="col-md-6">
            <label>Search Tags</label>
        <input type="text" class="form-control" name="tags" placeholder="Enter with commas" >
             </div>
 <div class="col-md-2">
            <label>Stock</label>
        <input type="number" class="form-control" name="stock" placeholder="Stock" >
             </div>
               </div>
 <div class="form-group">
  <div class="col-md-3"><label>Weight (in gram)<span class="required-label">*</span></label>
     <input type="text" class="form-control" name="weight" placeholder="Enter Weights" >


             </div>  
    <div class="col-md-3">
        <label>Tag Text</label>
     <input name="special_tag" id="tagtext" type="text" placeholder="Tag Text" class="form-control" >
    </div>  
        <div class="col-md-2">
                <input name="tagcolor" type="color" class="form-control" value="#000000">

        </div>

            </div>     
			<div class="form-group form-show-validation row">
				<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 ">Product Description <span class="required-label">*</span></label>
				<div class="col-lg-12 col-md-12 col-sm-12">
            	    <textarea name="description" class="form-control"  rows="10"></textarea>
				</div>
			</div>
	<div class="form-group form-show-validation row">
                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 ">Product Specification <span class="required-label">*</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <textarea name="specification" class="form-control"  rows="10"></textarea>
                </div>
            </div>
    
		   
            <div class="form-group">
                          <div class="col-md-4">	
                               
                            <label>Pictures</label>
                          <input type="file"  name="file[]"></td>
                           
                             </div>
                             <div class="col-md-4">	
                               
                            <label>Pictures</label>
                          <input type="file" name="file[]"></td>
                           
                             </div>
                             <div class="col-md-4">	
                               
                            <label>Pictures</label>
                          <input type="file"  name="file[]"></td>
                           
                             </div>
                             <div class="col-md-4">	
                               
                            <label>Pictures</label>
                          <input type="file"  name="file[]"></td>
                           
                             </div>
                                </div>				

             	<div class="clearfix"></div>
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



<script>
/*
$(document).ready(function() {

    $('#category').on('change', function() {
//alert('sss');
        var category_id = $(this).val();
     console.log('Changed');
        if(category_id) {

            $.ajax({
                url: "{{ url('admin/get-subcategories') }}/" + category_id,
                type: "GET",
                success: function(data) {

                    $('#subcategory').html('<option value="">Select Subcategory</option>');

                    $.each(data, function(key, value) {
                        $('#subcategory').append(
                            '<option value="'+ value.id +'">'+ value.name +'</option>'
                        );
                    });

                },
                error: function() {
                    alert('Error fetching subcategories');
                }
            });

        } else {
            $('#subcategory').html('<option value="">Select Subcategory</option>');
        }

    });

});
*/
</script>
</div>	
					</div>
				</div>
			</div>
			
		</div>

@endsection