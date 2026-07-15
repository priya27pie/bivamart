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
    title: 'Author has been updated!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
			<div class="row">	
<div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="card-title">Edit Author</div>
	</div>

 <form method="post" id="exampleValidation" action="{{route('submit.edit_author', $authors->id)}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
            <div class="col-md-5">
            <label>Author Name<span>*</span></label>
            <input type="text" class="form-control" name="author" value="{{$authors->author}}" placeholder="Author Name">
             </div> 

           <div class="col-md-3">
            <label>Email</label>
               <input type="email" class="form-control" name="email" value="{{$authors->email}}" placeholder="Email">

             </div>
               
            </div>          

          <div class="form-group">
              
          <div class="col-md-3"><label>DOB</label>
                        <input type="date" class="form-control" name="dob" value="{{$authors->dob}}" placeholder="Series Name">

             </div>
                 <div class="col-md-3"><label>Sex</label>
                                      @php
                                     $sexs = ['Male', 'Female', 'Others'];
                                    @endphp        
                    <select class="form-control" name="sex" >
                        <option value="">Choose</option>
                            @foreach($sexs as $sex)
                      <option value="{{ $sex }}" {{ $sex ==$authors->sex ? 'selected' : '' }}>
    {{ $sex }}</option>

                        @endforeach
                        

                    </select>

             </div>
           <div class="col-md-3"><label>Picture <span>*</span></label>

                <img src="{{ asset('uploads/'.$authors->picture)}}" width="100px"> 
                        <input type="file" class="form-control" name="picture" >

             </div>  
              

            </div>   

        
   

            <div class="form-group form-show-validation row">
                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 "> Description <span class="required-label">*</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <textarea name="description" class="form-control"  rows="10">{{$authors->description}}</textarea>
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