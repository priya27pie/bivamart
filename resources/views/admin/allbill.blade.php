@extends('admin.layouts.main')
@section('middle')

<script src="jquery-1.11.1.min.js"></script>

		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<div class="page-header">
						<h4 class="page-title">All Bills</h4>
						
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
                                    <th>Bill Time</th> 
                                    <th>Bill Id</th>
                                    <th>Amount</th>   
                                    <th>Shipping Charge</th>   
                                    <th>Status</th> 
                                    <th>Pay Status</th> 
                                    <th>TXNID/TXN MSG</th> 	
                                    <th>Refunded</th> 
                                    <th>Bill</th> 	
					<th>Show/Delete</th>
			</tr>
			</thead>
					<tbody>
				@php $count=1;@endphp	
  	@foreach($orders as $data)	

  	<tr>
  		<td>{{$count}}</td>
		<td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
  		<td>{{$data->order_id}}</td>
		<td>{{ $data->total_amount }} </td>
		<td>{{ $data->shipping_charge }} </td>
		
		<td>{{$data->status}}</td>
 		<td>{{$data->payment_status}}</td>
 		<td>{{$data->transaction_id}}</td>
 		<td>{{$data->payment_status}}</td>
 		<td><a href="{{ url('bill/'.$data->order_id)}}" target="_blank"  class="btn btn-xs btn-info">Bill</a>	</td>
		<td>

							<a href="showproduct/{{$data->id}}/{{$data->product_id}}"  class="btn btn-xs btn-success">Edit Product</a>	
							<a href="deleteproduct/{{$data->id}}/{{$data->product_id}}"  class="btn btn-xs btn-danger"onclick="return send();">Delete</a>	
							
							</td></tr>
@php ++$count; @endphp
  	@endforeach							
					</tbody>



</table>
		
		



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