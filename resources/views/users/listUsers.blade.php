<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/cache/packages.php">
    <link rel="stylesheet" href="../bootstrap/cache/services.php">
    <title>Document</title>
</head>

<body>
    <a href="{{ route('users.addUsers') }}"><button>Thêm mới</button></a>
    <h2>Danh sách Users</h2>
    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>email</td>
                <td>Tuổi</td>
                <td>Phongban_id</td>
                <td>Tên đơn vị</td>
                <td>Chức năng</td>
                
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($listUsers as $value):  ?>
            <tr>
                <td>{{$value->id }}</td>
                <td>{{$value->name }}</td>
                <td>{{$value->email }}</td>
                <td>{{$value->tuoi }}</td>
                <td>{{$value->phongban_id }}</td>
                <td>{{$value->ten_donvi }}</td>
                <td>
                    <button class="btn"> <a href="{{route('users.editUsers', $value->id)}}">Sửa</a></button>
                    <button onclick="confirm('Bạn có muốn xóa không')"><a href="{{route('users.delUsers', $value->id)}}">Xóa</a></button>
                </td>
                
            </tr>


            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
