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

function updatePublisherStatus(count) {
    let show_in_frontend = $('#show_in_frontend' + count).val();
    let id = $('#id' + count).val();
  //  alert(trending);
    $.ajax({
        url: "{{ url('/admin/update-publisher') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: id,
            show_in_frontend: show_in_frontend
        },
        success: function(response) {
            console.log(response);
            alert('Status updated successfully');
        },
        error: function() {
            alert('Error updating Status');
        }
    });
}


</script>
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<div class="page-header">
						<h4 class="page-title">All Publishers</h4>
						
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
							      <th>Publisher Img</th>
							  		<th>Name </th>
							        <th>Email</th>
							        <th>Phone</th>
							        <th>Is Visible</th>
								 <th> Edit/Delete</th>
								</tr>
							    </thead>
							   <tbody>

 	@php $count=1;@endphp	
  	@foreach($publishers as $data)	

  	<tr>
  		<td>{{$count}}</td>
  		<td><img src="{{ asset('uploads/'.$data->picture)}}" width="100px"></td>
		<td>{{$data->name}}</td>
		<td>{{$data->email}}</td>
		<td>{{$data->phone}}</td>
		<td>
  							 

							 
									@php
								   $interests = [
								        '1' => 'YES',
								        '0' => 'NO'
								    ];				
								   @endphp
	<select name="show_in_frontend" id="show_in_frontend{{$count}}" onchange="updatePublisherStatus({{$count}})">
    @foreach($interests as $value => $label)
        <option value="{{ $value }}" {{ $value == trim($data->show_in_frontend) ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>

   <input type="hidden" id="id{{$count}}" value="{{$data->id}}">

		</td>
<td>

							<a href="showpublisher/{{$data->id}}"  class="btn btn-xs btn-success">Edit Publisher</a>	
							<a href="deletepublisher/{{$data->id}}"  class="btn btn-xs btn-danger"onclick="return send();">Delete</a>	
							
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