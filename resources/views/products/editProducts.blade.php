@extends('layout/layout')
@section('content')
    <H2>Update Product</H2>
    <form action="" method="POST">
        @csrf
        <input type="hidden" value="{{$product->id}}" name="idPro" id="">
        <label for="">Name</label>
        <input class="form-control" type="text" name="nameProduct" id="" value="{{$product->name}}"><br><br>
        <label for="">Price</label>
        <input class="form-control" type="number" name="priceProduct" id="" value="{{$product->price}}"><br><br>
        <label for="">View</label>
        <input class="form-control" type="text" name="viewProduct" id="" value="{{$product->view}}"><br><br>
        <label for="">Category</label>
        <select name="category" id="" class="form-control">
            @foreach ($category as $value)
                <option value="{{$value->id}}">{{$value->name_category}}</option>
            @endforeach
        </select><br><br>
        <button class="btn btn-success">Chỉnh sửa</button>
    </form>
    @endsection