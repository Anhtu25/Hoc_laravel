@extends('layout/layout')
@section('content')
    
<H2>Add</H2>
<form action="{{route('products.storeProducts')}}" method="POST">
    @csrf
    <label for="">Name</label>
    <input type="text" name="nameProduct" id="" class="form-control"><br><br>
    <label for="">Price</label>
    <input type="number" name="priceProduct" id="" class="form-control"><br><br>
    <label for="">View</label>
    <input type="text" name="viewProduct" id="" class="form-control"><br><br>
    <label for="">Category</label>
    <select name="category" id="" class="form-control">
        @foreach ($category as $value)
            <option value="{{$value->id}}">{{$value->name_category}}</option>
        @endforeach
    </select><br><br>
    <button class="btn btn-success ">ADD</button>
</form>
@endsection
