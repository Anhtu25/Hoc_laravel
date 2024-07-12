<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('admin.layout.sidebar')
            <div class="col-9 offset-3 p-0 position-relative">
                <!-- header -->
                @include('admin.layout.header')
                <!-- main -->
                @yield('content')
                    <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
                    <button class="btn btn-info">Thêm mới</button>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Nokia 520</td>
                                <td>15000000 vnđ</td>
                                <td>
                                    Điện thoại mới giá ổn
                                </td>
                                <td>
                                    <button class="btn btn-warning">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Nokia 520</td>
                                <td>15000000 vnđ</td>
                                <td>
                                    Điện thoại mới giá ổn
                                </td>
                                <td>
                                    <button class="btn btn-warning">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Nokia 520</td>
                                <td>15000000 vnđ</td>
                                <td>
                                    Điện thoại mới giá ổn
                                </td>
                                <td>
                                    <button class="btn btn-warning">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Nokia 520</td>
                                <td>15000000 vnđ</td>
                                <td>
                                    Điện thoại mới giá ổn
                                </td>
                                <td>
                                    <button class="btn btn-warning">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- footer -->
                @include('admin.layout.footer')
            </div>
        </div>
    </div>


    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>