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
<style>
    
    .col-md-5,.col-md-4,.col-md-3,.col-md-2,.col-md-6{
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
		<div class="card-title">Edit Product</div>
	</div>

 <form method="post" id="exampleValidation" action="{{route('submit.edit_product', [$product->id, $product->product_id]) }}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
             <div class="col-md-3">
            <label>Product Category</label>
		
         <select  name="category" id="category" class="form-control" required>
        <option value="">Category</option>
          @foreach($categories as $data)  
   
       <option value='{{$data->id}}' {{$data->id==$product->category ? 'selected': ''}}>{{$data->category}}</option>
     
        @endforeach
          </select> 
             </div>
        <div class="col-md-3">
              <label>Product Subcategory</label>   
      
       <select name="subcategories[]" multiple class="form-control select2">
    @foreach($subcategories as $sub)
        <option value="{{ $sub->id }}"
            {{ $product->subcategories->contains('id', $sub->id) ? 'selected' : '' }}>
            {{ $sub->name }}
        </option>
    @endforeach
</select>     
            </div> 
            
      <div class="col-md-5">
        

            <label>Product Title</label>
			<input type="text" class="form-control" name="title" value="{{$product->title}}" placeholder="Title">
             </div> 

          
            </div>   	    

		  <div class="form-group">
		   <div class="col-md-3">
            <label>Author</label>
             
            <select name="author" class="form-control select2">
    <option value="">Select Author</option>
    @foreach($authors as $author)
        <option value="{{ $author->id }}"  {{ $author->id==$product->author ? 'selected' : '' }}>
            {{ $author->author }}
        </option>
    @endforeach
            </select>
             </div>
                   
          <div class="col-md-3"><label>Series Name</label>
             			<input type="text" class="form-control" name="series" value="{{$product->series}}" placeholder="Series Name">

             </div>
                 <div class="col-md-2"><label>Language</label>
<select name="language" class="form-control select2">
    <option value="">Select Language</option>
    @foreach($languages as $language)
        <option value="{{ $language->language_name }}"  {{ $language->language_name==$product->language ? 'selected' : '' }}>
            {{ $language->language_name }}
        </option>
    @endforeach
</select>
             </div>
           <div class="col-md-3"><label>Publisher </label>                 
<select name="publisher" class="form-control select2">
    <option value="">Select Publisher</option>
    @foreach($publishers as $publisher)
        <option value="{{ $publisher->id }}"  {{ $publisher->id==$product->publisher ? 'selected' : '' }}>
        {{ $publisher->name }}
        </option>
    @endforeach
</select>
             </div> 
             
            </div>   

          <div class="form-group">
          <div class="col-md-3"><label>Published on </label>
                        <input type="date" class="form-control" name="published_on" value="{{$product->published_on}}" placeholder="Published on ">

             </div>   
    
          <div class="col-md-3"><label>No. of Pages</label>
                        <input type="text" class="form-control" name="no_of_pages" value="{{$product->no_of_pages}}" placeholder="No. of Pages">

             </div>
                 <div class="col-md-2"><label>Binding </label>
                        <input type="text" class="form-control" name="binding" value="{{$product->binding}}" placeholder="Binding">

             </div>
           <div class="col-md-3"><label>Edition  </label>
                        <input type="text" class="form-control" value="{{$product->edition}}" name="edition" placeholder="Edition  ">

             </div>  
            
            </div>     
    <div class="form-group">
         <div class="col-md-3"><label>Illustrations</label>
                        <input type="text" class="form-control" value="{{$product->illustrations}}" name="illustrations" placeholder="Illustrations">

             </div>   

        <div class="col-md-3"><label>ISBN </label>
          <input type="text" class="form-control" name="isbn" value="{{$product->isbn}}" placeholder="ISBN ">

             </div>   
             <div class="col-md-2">
            <label>Product Price</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Product Price">
             </div>
        <div class="col-md-3">
            <label>Product Discounted Price</label>
            <input type="text" class="form-control" name="discounted_price" value="{{$product->discounted_price}}" placeholder="Product Discounted Price">
             </div>
      
            </div>   
  <div class="form-group">
  <div class="col-md-3"><label>Age Group </label>

    @php
    $selectedAges = explode(',', $product->age ?? '');
@endphp

<select class="form-control select2" name="age[]" multiple>
    <option value="0-2" {{ in_array('0-2', $selectedAges) ? 'selected' : '' }}>0-2</option>
    <option value="2-3" {{ in_array('2-3', $selectedAges) ? 'selected' : '' }}>2-3</option>
    <option value="3-5" {{ in_array('3-5', $selectedAges) ? 'selected' : '' }}>3-5</option>
    <option value="6-8" {{ in_array('6-8', $selectedAges) ? 'selected' : '' }}>6-8</option>
    <option value="9-12" {{ in_array('9-12', $selectedAges) ? 'selected' : '' }}>9-12</option>
    <option value="13-18" {{ in_array('13-18', $selectedAges) ? 'selected' : '' }}>Young Adult</option>
    <option value="18+" {{ in_array('18+', $selectedAges) ? 'selected' : '' }}>Adult</option>
</select>
          

             </div>  
<div class="col-md-6">
            <label>Search Tags</label>
        <input type="text" class="form-control" value="{{$product->tags}}" name="tags" placeholder="Enter with commas" >
             </div>

  </div>

   <div class="form-group">
  <div class="col-md-3"><label>Weight (in gram)<span class="required-label">*</span></label>
     <input type="text" class="form-control" name="weight" value="{{$product->weight}}" placeholder="Enter Weights" >


             </div>  
    <div class="col-md-3">
        <label>Tag Text</label>
     <input name="special_tag" id="tagtext" type="text" placeholder="Tag Text" value="{{$product->special_tag}}" class="form-control" >
    </div>  
        <div class="col-md-2">
                <input name="tagcolor" type="color" class="form-control" value="{{$product->tagcolor}}">

        </div>

            </div> 
			<div class="form-group form-show-validation row">
				<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 ">Product Description <span class="required-label">*</span></label>
				<div class="col-lg-12 col-md-12 col-sm-12">
            	    <textarea name="description" class="form-control"  rows="10">{{$product->description}}</textarea>
				</div>
			</div>
	<div class="form-group form-show-validation row">
                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 ">Product Specification <span class="required-label">*</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <textarea name="specification" class="form-control"  rows="10">{{$product->specification}}</textarea>
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
</div>
</div>	


					
  <?php
/*
if(isset($_POST['sub'])){
    
$price=$_POST['price'];
  	$price1=$_POST['discounted_price'];
	$dis=$price-$price1;
	$total_dis=$dis/$price;
	$dis_per=$total_dis*100;
	$discount=round($dis_per); 
$allowed = ["title","category","description","metal","stone","size","sub_category"];

$params = [];
$setStr = "";
foreach ($allowed as $key)
{
    if (isset($_POST[$key]) && $key != "uid")
    {
        $setStr .= "`$key` = :$key,";
        $params[$key] = htmlspecialchars($_POST[$key]);
    }
}
	if(isset($_FILES['uploadImg'])){

 foreach($_FILES['uploadImg']['tmp_name'] as $key=>$value){
     
$img1=$show->imageEdit($_FILES['uploadImg']['name'][$key]);
        $data1 = array(
        'product_id' => $product_id,  
        'img' => $img1,
        );
		if(move_uploaded_file($_FILES['uploadImg']['tmp_name'][$key],"../product_img/".$img1)){
        if($show->insert('product_img',$data1)){
        }
		}

      
  }   
}
$setStr .="`price`=:price,`discounted_price`=:discounted_price,`discount`=:discount,";

$setStr = rtrim($setStr, ",");
$params['product_id'] =$product_id;
$params['price'] =$price;
$params['discounted_price'] =$price1;
$params['discount'] =$discount;
$show->table ='product';
$show->cols =$setStr;
$show->id_name ='product_id';
$show->params =$params;


//print_r($params);
if($show->update_all()){
   		
echo '<script>
        setTimeout(function() {
        swal({
            title: "Thank You ",
            text: "for Updating!",
            type: "success"
        }, function() {
            window.location = "'.$_SERVER['REQUEST_URI'].'";
        });
    }, 1000);
</script>';
} else{
	echo "ss";
}

}

*/?>
  

			</div></div>
			</div>
			</div>
		
	@endsection