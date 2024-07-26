<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    @stack('stydes')

</head>
<body>

<div class="container">
    <h3 class="text-center mt-3 text-primary" >Đăng nhập</h3>
    @if (session('message'))
        <p class="text-danger">{{ session('message') }}</p>
    @endif
    <form action="{{ route('postLogin') }}" method="post">
        @csrf
        <div class="mt-3">
            Email:
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="mt-3">
            Password:
            <input type="password" name="password" id="" class="form-control">
        </div>
        <div class="mt-3">
            <input type="checkbox" name="remember" id="" >
            <label for="remember">Remember</label>
        </div>
        <button class="btn btn-primary mt-3" type="submit">Đăng nhập</button>
    </form>
    <a href="{{ route('register') }}"> Đăng ký</a>
</div>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    @stack('scripts')
</body>
</html>
