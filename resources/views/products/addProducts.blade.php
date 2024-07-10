@extends('layout/layout')
@section('content')
    
<H2>Add</H2>
<form action="{{route('products.storeProducts')}}" method="POST">
    @csrf
    <label for="">Name</label>
    <input type="text" name="nameProduct" id=""><br><br>
    <label for="">Price</label>
    <input type="number" name="priceProduct" id=""><br><br>
    <label for="">View</label>
    <input type="text" name="viewProduct" id=""><br><br>
    <label for="">Category</label>
    <select name="category" id="">
        @foreach ($category as $value)
            <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
    </select><br><br>
    <button>ADD</button>
</form>
@endsection
