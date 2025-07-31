@extends('backend.layout.master')
@push('css')
@endpush

@section('content')
<div class="font-22 ms-auto">
  <button type="button" class="btn btn-warning text-white create-category-btn"
    data-bs-toggle="modal" data-bs-target="#createCategoryModal">
    <i class="bx bx-layer-plus"></i> Create Category
  </button>
</div>


<div class="table-responsive" id="dynamic-content" style="max-height: calc(100vh - 14.5rem); overflow-y: auto;">
  {!! $dataTable->table() !!}

</div>
@include('backend.pages.category.partials.edit-category')
@include('backend.pages.category.partials.delete-category')
@include('backend.pages.category.partials.create-category')
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}

@endpush