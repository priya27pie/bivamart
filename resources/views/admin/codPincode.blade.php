@extends('admin.layouts.main')
@section('middle')


@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Added!',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

@if(session('status'))
<script>
Swal.fire({
    icon: 'success',
    title: 'deleted!',
    text: "{{ session('status') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
			<div class="row">	
<div class="col-md-6">
<div class="card">
	<div class="card-header">
		<div class="card-title">Add Cod Pincode</div>
	</div>

 	<form method="post" id="exampleValidation" action="{{route('submit.addcodPincode')}}" data-toggle="validator" enctype="multipart/form-data" > 
{{csrf_field()}}
		<div class="card-body">
		    <div class="form-group form-show-validation row">
				<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Add Pincode<span class="required-label">*</span></label>
				<div class="col-lg-8 col-md-9 col-sm-8">
					<input type="file" class="form-control" name="pincode" placeholder="pincode" required>
				</div>
			</div>
		 
		<div class="card-action">
			<div class="row">
				<div class="col-md-12">
					<input class="btn btn-success" type="submit" name="sub" value="Submit">
					<button class="btn btn-danger">Cancel</button>
				</div>										
			</div>
		</div>

</div>
</form>
</div>	
</div>

<div class="col-md-6">							<div class="card">
							
								<div class="card-body">
									<div class="table-responsive">
											<h5 class="page-title">All COD Pincode</h5>

							<table id="basic-datatables" class="display table table-striped table-hover">
							<thead>
								<tr>  
								  <th>Sl</th>
								  <th>Pincode</th>
								  <th>Delete</th>
								</tr>
							    </thead>
							   <tbody>
							@php $count=1;@endphp	
							@foreach($cod as $data)	
	   
								<tr>		
								<td>{{$count}}</td>

								<td>{{$data->pincode}}</td>

								<td><a href="deletecod/{{$data->id}}"  class="btn btn-xs btn-danger"onclick="return send();">Delete</a>	
							
							</td>
							</tr>
	@php ++$count; @endphp
  	@endforeach
					
</tbody></table>								
									
									</div>
				
									</div>
								</div>
	</div>


  
		
			</div>
			</div>
	
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

@endsection