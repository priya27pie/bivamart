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
		<div class="card-title">Bill Details</div>
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
 	<form method="post" id="exampleValidation" action="" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
    
          
      <div class="col-md-12">
            <label>Name :</label>
			{{$user->name}}<br>
             <label>Email :</label>
            {{$user->email}}
            <br>
            <label>Phone :</label>
            {{$user->shipping_phone}}<br>
             <label>Address :</label>
            {{$user->shipping_address}}<br>
            <label>City :</label>
            {{$user->shipping_city}}<br>
            <label>Landmark :</label>
            {{$user->shipping_landmark}}<br>
             <label>State :</label>
            {{$user->shipping_state}}<br>
            <label>Pincode :</label>
            {{$user->shipping_pincode}}
             </div> 
<div class="col-md-12">
    
<table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>  
                                  <th>Sl</th>
                                  <th>Name</th>
                                    <th>Qty </th>
                                    <th>Price</th>
                                 <th> ToTal</th>
                                </tr>
                                </thead>
                               <tbody>

    @php $count=1;@endphp   
    @foreach($order_item as $item) 

    <tr>
        <td>{{$count}}</td>
        <td>{{$item->product_name}}</td>
        <td>{{$item->qty}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->total}}</td>
    

    </tr>
    @php ++$count; @endphp
    @endforeach


</tbody></table>                        

</div>

         
		<div class="card-action">
			<div class="row">
				<div class="col-md-12">
                <a href="{{ url('bill/'.$order->order_id)}}" target="_blank" class="btn btn-md btn-info">Bill</a>
            <a href="{{ url('admin/pendingBill')}}" class="btn btn-md btn-success">Back</a>
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