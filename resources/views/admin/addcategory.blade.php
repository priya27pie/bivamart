@extends('admin.layouts.main')
@section('middle')


@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Deleted!',
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
    title: 'Category Added!',
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
		<div class="card-title">Add Category</div>
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
 	<form method="post" id="exampleValidation" action="{{route('submit.addcategory')}}" data-toggle="validator" enctype="multipart/form-data" > 
{{csrf_field()}}
		<div class="card-body">
		    <div class="form-group form-show-validation row">
				<label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Category Name <span class="required-label">*</span></label>
				<div class="col-lg-8 col-md-9 col-sm-8">
					<input type="text" class="form-control" name="category" placeholder="Category Name " required>
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
											<h5 class="page-title">All Category</h5>

							<table id="basic-datatables" class="display table table-striped table-hover">
							<thead>
								<tr>  
								  <th>Sl</th>
								  <th>Category</th>
							
								  <th>Delete</th>
								</tr>
							    </thead>
							   <tbody>
							   	<?php $count=1;?>
							   	@foreach($categories as $data)	
							   <tr>		
						<td>{{$count}}</td>
					
						<td>{{$data->category}}</td>

 							<td>

							
							<a href="deletecategory/{{$data->id}}"  class="btn btn-xs btn-danger"onclick="return send();">Delete</a>	
							
							</td>
							</tr>
							<?php ++$count; ?>
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