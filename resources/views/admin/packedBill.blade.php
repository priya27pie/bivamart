@extends('admin.layouts.main')
@section('middle')
@if(session('success'))
<script>
Swal.fire({
    icon: 'Success',
    title: 'Your order has been updated.',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif 
<script src="jquery-1.11.1.min.js"></script>

		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<div class="page-header">
						<h4 class="page-title">All Confirmed Bill</h4>
						
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
                                     <th>Bill Id</th>
	                                <th>Bill Time</th> 
                                    <th>Payment Details</th>   
                                    <th>Product Details</th> 
					<th>Status</th>
			</tr>
			</thead>
					<tbody>
				@php $count=1;@endphp	
  	@foreach($orders as $data)	
  @php
        $order_items = \App\Models\OrderItem::where('order_id', $data->id)->get();

        foreach ($order_items as $item) {
            if (str_starts_with($item->product_id, 'PROD')) {
                $item->product_details = \App\Models\Product::where('product_id', $item->product_id)->first();
            } elseif (str_starts_with($item->product_id, 'OPROD')) {
                $item->product_details = \App\Models\Otherproduct::where('product_id', $item->product_id)->first();
            }
        $image = \App\Models\Product_image::where('product_id', $item->product_id)->first();

        $item->image = $image ? $image->images : 'no-image.jpg';    
        }
    @endphp
  	<tr>
  		<td>{{$count}}</td>
  		<td>
  <a href="{{ url('billdetails/'.$data->order_id)}}">{{$data->order_id}}</a><br>
<a href="{{ url('bill/'.$data->order_id)}}" target="_blank" class="btn btn-xs btn-info">Bill</a>
  		</td>
		<td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y h:i a') }}</td>
		<td>Price : {{ $data->total_amount }}<br>Shipping: {{ $data->shipping_charge }}<br> Payment Method : {{ $data->payment_method }}<br> Payment ID : {{ $data->transaction_id }}
		</td>
 		 <td>
            @foreach($order_items as $item)
                {{ $item->product_details?->title }}<br>Qty: {{ $item->qty }}<br>
  				@if($item->image)
        <img src="{{ asset('uploads/'.$item->image) }}" width="50px" alt="{{$item->product_name }}">
                 @else
         <img src="{{ asset('uploads/no-image.png') }}" width="50px" alt="No Image">
                 @endif
            @endforeach


        </td>
		<td>
		<button
    type="button"
    class="btn btn-xs btn-info pack-btn"
    data-toggle="modal"
    data-target="#packModal"
    data-id="{{ $data->id }}"
    data-order="{{ $data->order_id }}">
    Authorized
</button>	
	<a href="deletebill/{{$data->id}}" onclick="return send();" class="btn btn-xs btn-danger">Delete</a>	
	
		
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

	<!-- Authorize Modal -->
<div class="modal fade" id="packModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.bill.packBill') }}">
            @csrf

            <input type="hidden" name="order_id" id="modal_order_id">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Packed Details</label>
                        <input type="date" name="packing_date"  class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                       Submit
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                        Cancel
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
<script >
		$(document).ready(function() {

	$('.pack-btn').click(function () {

    let id = $(this).data('id');
    let orderNo = $(this).data('order');

    $('#modal_order_id').val(id);
    $('#modal_bill_no').text(orderNo);

});		
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