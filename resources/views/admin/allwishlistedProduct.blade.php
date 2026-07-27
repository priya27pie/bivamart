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
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<div class="page-header">
						<h4 class="page-title">All Wishlisted Products</h4>
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
							
								<div class="card-body">
									<div class="table-responsive">
					
							<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Email</th>
            <th>Product</th>
            <th>Type</th>
            <th>Added On</th>
        </tr>
    </thead>
    <tbody>
        @foreach($wishlists as $key => $wishlist)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $wishlist->user->name ?? 'N/A' }}</td>
                <td>{{ $wishlist->user->email ?? 'N/A' }}</td>
                <td>
    @if($wishlist->product_type == 'book')
        {{ optional($wishlist->product)->title ?? 'N/A' }}
    @else
        {{ optional($wishlist->otherproduct)->title ?? 'N/A' }}
    @endif
</td>
                <td>{{ ucfirst($wishlist->product_type) }}</td>
                <td>{{ $wishlist->created_at->format('d-M-Y h:i A') }}</td>
            </tr>
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