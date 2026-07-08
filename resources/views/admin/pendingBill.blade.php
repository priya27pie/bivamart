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
						<h4 class="page-title">All Pending Bill</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
				<form action="{{ route('admin.pendingDateSearch') }}" method="GET" class="date-form">
										<div class="lab-date">
									<label>From</label>
									<input type="date" id="date1" name="date1" value="{{ request('date1') }}">
								</div>
								<div class="lab-date">
									<label>To</label>
									<input type="date" id="date2" name="date2" value="{{ request('date2') }}">
								</div>	
								<div class="lab-date search-export">
							      	<button type="submit">Search<i class="fa fa-search"></i></button>
							    </div>	
								<div class="lab-date Export">
						  <a href="{{ route('admin.exportPendingBill',[
						            'date1'=>request('date1'),
						            'date2'=>request('date2')
						        ]) }}"
						        class="btn btn-danger">
						            Export
						        </a>				
						        				</div>								    						
							</form>
						</div>
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
  
  	<tr>
  		<td>{{$count}}</td>
  		<td>
			<a href="{{ url('admin/billdetails/'.$data->order_id)}}">{{$data->order_id}}</a><br>
			<a href="{{ url('bill/'.$data->order_id)}}" target="_blank" class="btn btn-xs btn-info">Bill</a>
  		</td>
		<td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y h:i a') }}</td>
		<td>Price : {{ $data->total_amount }}<br>Shipping: {{ $data->shipping_charge }}<br> Payment Method : {{ $data->payment_method }}<br> Payment ID : {{ $data->transaction_id }}
		</td>

 		<td>
           @foreach($data->items as $item)
				<span>
		        {{ $item->product_details?->title }}<br>
		        Qty : {{ $item->qty }}
		    </span>
			

  				@if($item->image)
        	<img src="{{ asset('uploads/'.$item->image) }}" width="50px" alt="{{$item->product_name }}">
                 @else
         	<img src="{{ asset('uploads/no-image.png') }}" width="50px" alt="No Image">
                 @endif
            @endforeach

        </td>



		<td style="padding: 0 !important;">
		<button type="button" class="btn btn-xs btn-info confirm-btn" data-toggle="modal" data-target="#confirmModal" data-id="{{ $data->id }}" data-order="{{ $data->order_id }}">
		Confirm
		</button>	
		<a href="deletebill/{{$data->id}}" onclick="return send();" class="btn btn-xs btn-danger">Delete</a>	
		</td>
	</tr>
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
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.bill.confirm') }}">
            @csrf

            <input type="hidden" name="order_id" id="modal_order_id">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirm Order</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                  

                    <div class="form-group">
                        <label>Select Tentative Date</label>
                        <input type="date" name="tentative_date" placeholder="Payment ID" class="form-control">
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

	$('.confirm-btn').click(function () {

    let id = $(this).data('id');
    let orderNo = $(this).data('order');

    $('#modal_order_id').val(id);
    $('#modal_bill_no').val(orderNo);

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


<style>
td span{ float: right; width: 85%; height: 46px;}
td img{ float: left; width: 35px; height: 45px; border-radius: 5px;}
td button.btn-info{width: 99%; text-align: center; padding: 5px 0; margin: 0 auto 2px; background: #00d3ff !important; display: block;}
td button.btn-info:hover{}
td a{text-align: center; font-size: 11px; margin: 0 auto; display: block; color: #055530;}
td a.btn-danger{width: 99%;  text-align: center; padding: 5px 0; margin: 0 auto; background: #f00 !important;display: block;}
td a.btn-danger:hover{}
td a.btn-info{width: 50%; float: none; text-align: center; padding: 3px 0; margin: 5px auto 0; background: #08c16b !important; color: #fff; font-size: 13px; display: block; }
td a.btn-info:hover{}
.table td { font-size: 12px !important; border-color: #ebedf2 !important; border-top-color: rgb(235, 237, 242); border-bottom-color: rgb(235, 237, 242); padding: 8px !important; }
.date-form{width: 100%;padding: 10px 15px;margin: 0 0 20px;background: #fff;border: 0.5px solid #cccccc75;border-radius: 5px;display: inline-block;}
.date-form .lab-date{width: 22%;float: left;padding: 0 0;margin: 0 20px 0 0;}
.date-form .lab-date label{color: #111213 !important;font-size: 15px !important;padding: 5px 0 0 0;margin: 0 0;float: left;width: 35%;}
.date-form .lab-date input{color: #111213 !important;font-size: 13px !important;padding: 5px;margin: 0;float: right;width: 65%;border: 0.5px solid #ccccccb5;border-radius: 5px;}
.date-form .search-export{width: 35%;padding: 0 0;margin: 0 0;}
.date-form .search-export input{color: #000 !important;font-size: 13px !important;padding: 5px 10px;margin: 0;float: left;width: 80%;border: 0.5px solid #ccccccb5;border-radius: 5px;}
.date-form .search-export button{color: #fff !important;font-size: 13px !important;padding: 5px;margin: 0;float: right;width: 20%;border: 0.5px solid #ccccccb5;border-radius: 0 5px 5px 0px; background: #f49c27;height: 32px;}
.date-form .search-export button:hover{background: #471d05;  cursor: pointer;}
.date-form .Export{width: 15%; padding: 0; margin: 0; float: right;}
.date-form .Export button{color: #fff !important; font-size: 13px !important; padding: 5px; margin: 0; float: right; border-radius: 5px; background: #f3545d; border: none; width: 100%; cursor: pointer;}
.date-form .Export button:hover{background: #ca010c;}
</style>