@extends('admin.layout.index')
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('admin.products.addProducts') }}"><button class="btn btn-info">Thêm mới</button></a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $value)
                    <tr>
                        <th scope='row'>{{ $key + 1 }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->product_price }}</td>
                        <td><img class="img-product" src="/{{ $value->image }}" alt="{{ $value->name }}" width="100px">
                        </td>
                        <td>
                            <button class="btn btn-warning">Sửa</button>
                            <button class="btn btn-danger btn-delete" data-bs-id="{{ $value->id }}" data-bs-toggle="modal"
                                data-bs-target="#deleteModel">Xóa</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{ $products->links('pagination::bootstrap-5') }}
    <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận xóa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formDelete">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        Bạn có muốn xóa không???
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" >Xác nhận xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var deleteModel = document.getElementById('deleteModel')
        deleteModel.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')

            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action','{{ route("admin.products.deleteProduct") }}?idProduct='+id)

        })
    </script>
@endpush
