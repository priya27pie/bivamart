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
    
    .col-md-6,.col-md-5,.col-md-4,.col-md-3,.col-md-2,.col-md-8{
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
    title: 'Product Addded!',
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
		<div class="card-title">Add Product->Other</div>
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
 	<form method="post" id="exampleValidation" action="{{route('submit.otherproduct')}}" data-toggle="validator" enctype="multipart/form-data" > 
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
<div id="dynamic-fields-container" class="col-md-8">
        <!-- Initial input field -->
        <div class="input-group" class="col-md-12">
            <input type="text" name="label_name[]" placeholder="Label" class="form-control">
              <input type="text" name="lable_value[]" placeholder="Name" class="form-control">
          <button type="button" class="btn btn-danger remove-field">Remove</button>
        </div>
    </div>
    <div class="col-md-2">
    <button type="button" id="add-more-button" class="btn btn-primary">Add More</button>
</div>
          </div>   
    <div class="form-group">
       
             <div class="col-md-4">
            <label>Product Price</label>
            <input type="text" class="form-control" name="price" placeholder="Product Price">
             </div>
        <div class="col-md-4">
            <label>Product Discounted Price</label>
            <input type="text" class="form-control" name="discounted_price" placeholder="Product Discounted Price">
             </div>
       <div class="col-md-3">
            <label>Brand</label>
        <select  name="category" id="category" class="form-control" required>
        <option value="">Category</option>
         
          @foreach($brand as $data)  
       <option value='{{$data->name}}'>{{$data->name}}</option>
      
        @endforeach
          </select> 
             </div>
      
            </div>   
 <div class="form-group">
       
             <div class="col-md-4">
            <label>Search Tags</label>
            <input type="text" class="form-control" name="tags" placeholder="Search Tags">
             </div>
      
      

  <div class="col-md-2"><label>Weight (in gram)<span class="required-label">*</span></label>
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
    $(document).ready(function() {
    $('#add-more-button').click(function() {
        var newField = `
            <div class="input-group mt-2">
          
                <input type="text" name="label_name[]" class="form-control" placeholder="Label">
                 <input type="text" name="lable_value[]" class="form-control" placeholder="Name">
               <button type="button" class="btn btn-danger remove-field">Remove</button>
            </div>
        `;
        $('#dynamic-fields-container').append(newField);
    });

    // Use a delegated event listener for dynamically added 'remove' buttons
    $(document).on('click', '.remove-field', function() {
        $(this).closest('.input-group').remove();
    });
});

  
</script>
</div>	
					</div>
				</div>
			</div>
			
		</div>

@endsection