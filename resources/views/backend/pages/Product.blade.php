@extends('backend.layout.master')

@section('content')
<div class="card-body" style="min-height: 100vh; padding-top: 30px;">
    <div class="container">
        <h1>Manage Products</h1>

        <!-- ================= DataTable ================= -->
        <table id="product-table" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated dynamically from server -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for Edit Product (Optional) -->
<div class="modal fade" id="editModalProduct" tabindex="-1" aria-labelledby="editModalProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Content Here -->
        </div>
    </div>
</div>

<!-- Modal for Delete Product (Optional) -->
<div class="modal fade" id="deleteModalProduct" tabindex="-1" aria-labelledby="deleteModalProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Content Here -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('product.content') }}", // You should define this route
        columns: [
            { data: 'action', name: 'action', orderable: false, searchable: false },
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'price', name: 'price' },
            { data: 'updated_at', name: 'updated_at' }
        ],
        dom: 'Bfrtip',
        buttons: [
            'excel', 'csv', 'pdf', 'print', 'reset', 'reload'
        ]
    });
});
</script>
@endpush
