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
                            `<option value="${value.name}">${value.name}</option>`
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
<script>
$(document).ready(function() {
    $('.select2').select2({
        allowClear: true
    });
});
</script>
<script>
function updateSpec(id) {
    let label_name = document.getElementById('label_name_' + id).value;
    let label_value = document.getElementById('label_value_' + id).value;
   // alert(label_value);
    fetch("{{ url('admin/updateSpec') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            id: id,
            label_name: label_name,
            label_value: label_value
        })
    })
    .then(res => {
        console.log('Response status:', res.status);
        return res.json();
    })
    .then(data => {
        console.log('Response data:', data);
        alert('Updated successfully');
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function deleteSpec(id) {
    if (!confirm('Are you sure?')) return;

    fetch("{{ url('admin/deleteSpec') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ id: id })
    })
    .then(res => {
        console.log('Response status:', res.status);

        if (!res.ok) {
            throw new Error('Request failed');
        }

        return res.json();
    })
    .then(data => {
        console.log('Response data:', data);

        if (data.success) {
            document.getElementById('row-' + id).remove();
            alert('Deleted successfully');
        } else {
            alert('Delete failed');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>

<style>
    
    .col-md-5,.col-md-4,.col-md-3,.col-md-2,.col-md-8{
        display:inline-block !important;
    }
</style>
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Product Updated!',
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
		<div class="card-title">Edit Product->Others</div>
	</div>

 <form method="post" id="exampleValidation" action="{{route('submit.edit_product_other', [$otherproducts->id, $otherproducts->product_id]) }}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
             <div class="col-md-3">
            <label>Product Category</label>
		
         <select  name="category" id="category" class="form-control" required>
        <option value="">Category</option>
          @foreach($categories as $data)  
   
       <option value='{{$data->id}}' {{$data->id==$otherproducts->category ? 'selected': ''}}>{{$data->category}}</option>
     
        @endforeach
          </select> 
             </div>
        <div class="col-md-3">
              <label>Product Subcategory</label>   
             <select name="subcategories[]" multiple class="form-control select2">
    @foreach($subcategories as $sub)
        <option value="{{ $sub->id }}"
            {{ $otherproducts->subcategories->contains('id', $sub->id) ? 'selected' : '' }}>
            {{ $sub->name }}
        </option>
    @endforeach
</select>     
            </div> 
            
      <div class="col-md-5">
        

            <label>Product Title</label>
			<input type="text" class="form-control" name="title" value="{{$otherproducts->title}}" placeholder="Title">
             </div> 

          
            </div>   	    
    <div class="form-group">
  <table id="basic-datatables" class="display table table-striped table-hover col-md-4">
                            <thead>
                                <tr>
                                <th>Label</th>  
                                 <th>Value</th>
                                 <th>Edit/Delete</th>
                                 </tr>  
                      </thead>          

   <tbody>

       @foreach($otherspecifications as $speci) 

    <tr id="row-{{$speci->id}}">
     <td>
        <input type="text" class="form-control" value="{{$speci->label_name}}" id="label_name_{{$speci->id}}">
    </td>

    <td>
        <input type="text" class="form-control" value="{{$speci->lable_value}}" id="label_value_{{$speci->id}}">
    </td>    

    <td>
        <button type="button" class="btn btn-xs btn-success" onclick="updateSpec({{$speci->id}})">Update</button>
        <button type="button" class="btn btn-xs btn-danger" onclick="deleteSpec({{$speci->id}})">Delete</button>
    </td>
     </tr>  
                  @endforeach
</tbody>
</table>
     

          </div>         
   <label>Add </label>        
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
        
             <div class="col-md-2">
            <label>Product Price</label>
            <input type="text" class="form-control" name="price" value="{{$otherproducts->price}}" placeholder="Product Price">
             </div>
        <div class="col-md-3">
            <label>Product Discounted Price</label>
            <input type="text" class="form-control" name="discounted_price" value="{{$otherproducts->discounted_price}}" placeholder="Product Discounted Price">
             </div>
      <div class="col-md-3">
            <label>Brand</label>
        <select  name="brand" class="form-control" required>
        <option value="">Brand</option>
         
         @foreach($brand as $data)
    <option value="{{ $data->name }}"
        {{ $otherproducts->brand == $data->name ? 'selected' : '' }}>
        {{ $data->name }}
    </option>
@endforeach
          </select> 
             </div>
      
            </div>   
 
 <div class="form-group">
       
             <div class="col-md-4">
            <label>Search Tags</label>
            <input type="text" class="form-control" name="tags" value="{{$otherproducts->tags}}" placeholder="Search Tags">
             </div>
      
      

  <div class="col-md-2"><label>Weight (in gram)<span class="required-label">*</span></label>
     <input type="text" class="form-control" name="weight" value="{{$otherproducts->weight}}" placeholder="Enter Weights" >


             </div>  
    <div class="col-md-3">
        <label>Tag Text</label>
     <input name="special_tag" id="tagtext" type="text" placeholder="Tag Text" value="{{$otherproducts->special_tag}}" class="form-control" >
    </div>  
        <div class="col-md-2">
                <input name="tagcolor" type="color" class="form-control" value="#000000">

        </div>

            </div>   

			<div class="form-group form-show-validation row">
				<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 ">Product Description <span class="required-label">*</span></label>
				<div class="col-lg-12 col-md-12 col-sm-12">
            	    <textarea name="description" class="form-control"  rows="10">{{$otherproducts->description}}</textarea>
				</div>
			</div>
	<div class="form-group form-show-validation row">
                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 ">Product Specification <span class="required-label">*</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <textarea name="specification" class="form-control"  rows="10">{{$otherproducts->specification}}</textarea>
                </div>
            </div>
    
		   
            <div class="form-group">
            	
               @foreach($product_images as $imgs)
    <div>
        <img src="{{ asset('uploads/'.$imgs->images) }}" width="80">

        <!-- Replace this image -->
        <input type="file" name="replace_images[{{ $imgs->id }}]">

      
    </div>
@endforeach
                            
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



			</div></div>
			</div>
			</div>
		
	@endsection