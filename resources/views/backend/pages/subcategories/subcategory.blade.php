@extends('backend.layout.master')

@push('css')
@endpush

@section('content')
<!-- ================= Create SubCategory Button ================= -->
<div class="font-22 ms-auto">
    <!-- Button to trigger the Create SubCategory modal -->
    <button type="button" class="btn btn-warning text-white create-SubCategory-btn" data-bs-toggle="modal"
        data-bs-target="#createSubcategoryModal">
        <i class="bx bx-layer-plus"></i> Create SubCategory
    </button>
</div>

<!-- ================= SubCategory Table ================= -->
<div class="table-responsive" id="dynamic-content" style="max-height: calc(100vh - 14.5rem); overflow-y: auto;">
    <!-- DataTable for displaying Subcategories -->

    {!! $dataTable->table() !!}
</div>





@include('backend.pages.subcategories.partials.edit-subcategory', ['categories' => $categories])

@include('backend.pages.subcategories.partials.delete-subcategory')

@include('backend.pages.subcategories.partials.create-subcategory')

@endsection
@push('scripts')
<!-- DataTable Scripts -->
{!! $dataTable->scripts() !!}
<script src="{{ asset('assets\js\backend\edit_subcategorypage.js') }}"></script>
<script src="{{ asset('assets\js\backend\create_subcategorypage.js') }}"></script>
    <script src="{{ asset('assets\js\backend\dashboard.js')}}"></script>
<!-- <script src="{{ asset('assets\js\backend\load-subcategorypage.js') }}"></script> -->

@endpush