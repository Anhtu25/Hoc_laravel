@extends('admin.layout.index')
@section('title')
    Danh sách sản phẩm
@endsection
@push('stydes')
@endpush
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <form action="{{ route('admin.products.addPostProducts') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label for="nameProduct">Tên sản phẩm</label>
                <input type="text" name="nameProduct" id="nameProduct" class="form-control">
            </div>
            <div class="mt-3">
                <label for="priceProduct">Giá sản phẩm</label>
                <input type="number" name="priceProduct" id="priceProduct" class="form-control">
            </div>
            <div class="mt-3">
                <label for="imageProduct">Ảnh</label>
                <input type="file" name="imageProduct" id="imageProduct" accept="image/*" class="form-control">
            </div>
            <button class="btn btn-success mt-3"  type="submit">Thêm mới</button>
        </form>
    </div>
@endsection
@push('scripts')
@endpush
