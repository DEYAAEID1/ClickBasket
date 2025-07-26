@extends('backend.layout.master')
@push('css')
@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="font-22 ms-auto">
  <button type="button" class="btn btn-warning text-white create-category-btn"
    data-bs-toggle="modal" data-bs-target="#createproductModal">
    <i class="bx bx-layer-plus"></i> New Product
  </button>
</div>
<div class="table-responsive" id="dynamic-content" style="max-height: calc(100vh - 14.5rem); overflow-y: auto;">
  {!! $dataTable->table() !!}

</div>

<!-- Modal for Edit Product (Optional) -->


 @include('backend.pages.product.partials.create-product',['subcategories' => $subcategories])
 @include('backend.pages.product.partials.edit-product',['subcategories' => $subcategories])
 @include('backend.pages.product.partials.delete-product')
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
<script src="{{asset('assets\js\backend\dashboard.js')}}"> </script>
<script src="{{asset('assets\js\backend\create_product.JS')}}"></script>
<script src="{{asset('assets\js\backend\edit_product.JS')}}"></script>
<script src="{{asset('assets\js\backend\delete_product.js')}}"></script>
@endpush
