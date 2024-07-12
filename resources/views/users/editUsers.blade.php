<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Update User</h2>
          
        @csrf
        <input type="hidden" name="idUser">
        <label for="">Tên</label>
        <input type="text" name="nameUser" id="" value="{{$user->name}}"><br><br>
        <label for="">Email</label>
        <input type="email" name="emailUser" value="{{$user->email}}"><br><br>
        <label for="">Phòng ban</label>
        <select name="phongbanUser" id="">
            @foreach ($phongban as $user)
                <option value="{{$user->id}}">{{$user->ten_donvi}}</option>
            @endforeach
        </select><br><br>
        <label for="">Tuổi</label>
        <input type="text" name="tuoiUser" value="{{$user->tuoi}}"><br><br>
        <button>Update</button>
    </form>
</body>
</html>