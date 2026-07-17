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
		<div class="card-title">Show Users</div>
	</div>

 <form method="post" id="exampleValidation" action="{{route('submit.edit_author', $users->id)}}" data-toggle="validator" enctype="multipart/form-data" > 
        {{csrf_field()}}
		<div class="card-body">
        	<div class="form-group">
            <div class="col-md-3">
            <label> Name<span>*</span></label>
            <input type="text" class="form-control" name="author" value="{{$users->name}}" placeholder="Author Name">
             </div> 

           <div class="col-md-3">
            <label>Email</label>
               <input type="email" class="form-control" name="email" value="{{$users->email}}" placeholder="Email">

             </div>
          <div class="col-md-3">
            <label>Phone</label>
               <input type="text" class="form-control" name="phone" value="{{$users->phone}}" placeholder="Phone">

             </div>  
              <div class="col-md-2">
            <label>Biva Points</label>
        <input type="text" class="form-control" name="biva_points" value="{{$users->biva_points}}" placeholder="Biva Points">

             </div>     
            </div>          

          <div class="form-group">
            <h5>Primary Address </h5> 
          <div class="col-md-5"><label>Address</label>
        
        <input type="text" class="form-control" name="email" value="{{$users->address}}" placeholder="Address">

             </div>
                
            <div class="col-md-3">
            <label>Landmark</label>
               <input type="text" class="form-control" name="landmark" value="{{$users->landmark}}" placeholder="Landmark">

             </div>       
            <div class="col-md-2">
            <label>City</label>
               <input type="text" class="form-control" name="city" value="{{$users->city}}" placeholder="City">

             </div>    
            </div>   

         <div class="form-group">
          <div class="col-md-3"><label>State</label>
        
        <input type="text" class="form-control" name="state" value="{{$users->state}}" placeholder="State">

             </div>
                
            <div class="col-md-3">
            <label>Pincode</label>
               <input type="text" class="form-control" name="pincode" value="{{$users->pincode}}" placeholder="Pincode">

             </div>       
           
            </div>   
    <div class="form-group">

        <div class="card">
                            
                <div class="card-body">
                            <div class="table-responsive">
                    
                            <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>  
                                  <th>Sl</th>
                                <th>Name </th>
                                <th>Email</th>
                                <th>Phone</th>
                                 <th>Address</th>
                                 <th>Landmark</th>
                                 <th>City</th>
                                 <th>State</th>
                                 <th>Pincode</th>
                                </tr>
                                </thead>
                               <tbody>

    @php $count=1;@endphp   
    @if($addresses->count())
        @foreach($addresses as $address)

    <tr>
        <td>{{$count}}</td>
        <td>{{$address->user_name}}</td>
        <td>{{$address->user_email}}</td>
        <td>{{$address->user_phone}}</td>
        <td>{{$address->address}}</td>
        <td>{{$address->landmark}}</td>
        <td>{{$address->city}}</td>
        <td>{{$address->state}}</td>
        <td>{{$address->pincode}}</td>
        
        
    </tr>
    @php ++$count; @endphp
 
    @endforeach
   @endif

</tbody></table>                                
                                    
               </div>
 
  </div>

    </div>
    </div>
        
    
   

    
      
        <div class="card-action">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('admin/alluser') }}" class="btn btn-success">Back</a>
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
    <script >
        $(document).ready(function() {
            $('#basic-datatables').DataTable({
            });

            $('#multi-filter-select').DataTable( {
                "pageLength": 5,
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                                );

                            column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="la la-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="la la-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                    ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>