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
<script>
/*
function updateTrending(count) {
    let trending = $('#trending' + count).val();
    let id = $('#id' + count).val();
  //  alert(trending);
    $.ajax({
        url: "{{ url('/admin/update-trending') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: id,
            trending: trending
        },
        success: function(response) {
            console.log(response);
            alert('Trending updated successfully');
        },
        error: function() {
            alert('Error updating trending');
        }
    });
}
*/

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<div class="page-header">
						<h4 class="page-title">All Product</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
							
								<div class="card-body">
									<div class="table-responsive">
					
							<table id="basic-datatables" class="display table table-striped table-hover">
							<thead>
								<tr>  
								  <th>Sl</th>
									<th>Product Id</th>
									<th>Category</th>
									<th>Sub Category</th>
									<th>Title </th>
									<th>Price</th>
									<th>Discounted Price</th>
								 <th> Edit/Delete</th>
								</tr>
							    </thead>
							   <tbody>

 	@php $count=1;@endphp	
  	@foreach($products as $data)	

  	<tr>
  		<td>{{$count}}</td>
  		<td>{{$data->product_id}}</td>
		<td>{{ $data->categoryData->category ?? 'N/A' }} </td>
		<td>
			@foreach($data->subcategories as $sub)
   			 {{ $sub->name }},
				@endforeach
				 </td>
		<td>{{$data->title}}</td>
 		<td>{{$data->price}}</td>
		<td>{{$data->discounted_price}}</td>
	<!---	<td>
  							 

							 
									@php
   									 $interests = ['NO', 'YES'];
									@endphp
						<select name="trending" id="trending{{$count}}" onchange="updateTrending({{$count}})">
					@foreach($interests as $interest)
		<option value="{{ $interest }}" {{ $interest == trim($data->trending) ? 'selected' : '' }}>
    {{ $interest }}</option>
 					@endforeach

 </select>	  <input type="hidden" id="id{{$count}}" value="{{$data->id}}">

		</td>
		<td>
  							 

							 
									@php
   									 $interests = ['NO', 'YES'];
									@endphp
						<select name="latest" id="latest{{$count}}" onchange="updateLatest({{$count}})">
					@foreach($interests as $interest)
		<option value="{{ $interest }}" {{ $interest == trim($data->latest) ? 'selected' : '' }}>
    {{ $interest }}</option>
 					@endforeach

 </select>	 

		</td>
		-->
<td>

							<a href="showproduct/{{$data->id}}/{{$data->product_id}}"  class="btn btn-xs btn-success">Edit Product</a>	
							<a href="deleteproduct/{{$data->id}}/{{$data->product_id}}"  class="btn btn-xs btn-danger"onclick="return send();">Delete</a>	
							
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