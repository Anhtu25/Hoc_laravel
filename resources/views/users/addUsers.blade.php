<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('users.storeUsers')}}" method="POST">
        <h2>Add User</h2>
        @csrf
        <label for="">Tên</label>
        <input type="text" name="nameUser" id=""><br><br>
        <label for="">Email</label>
        <input type="email" name="emailUser"><br><br>
        <label for="">Phòng ban</label>
        <select name="phongbanUser" id="">
            @foreach ($phongban as $value)
                <option value="{{$value->id}}">{{$value->ten_donvi}}</option>
            @endforeach
        </select><br><br>
        <label for="">Tuổi</label>
        <input type="text" name="tuoiUser"><br><br>
        <button>Thêm mới</button>
    </form>
</body>
</html>