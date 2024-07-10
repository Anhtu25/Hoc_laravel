@extends('layout/layout')
@section('content')
    <h2>List product</h2>
    <a href="{{ route('products.addProducts') }}"><button class="btn btn-primary m-2">Add</button></a>
    <form action="{{ route('products.search') }}" method="GET" class="d-flex">
        <input class="form-control" type="search" value="{{ request()->input('query') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <td class="text-center fw-bold">Id</td>
                <td class="text-center fw-bold">Name</td>
                <td class="text-center fw-bold">Price</td>
                <td class="text-center fw-bold">View</td>
                <td class="text-center fw-bold">Category_id</td>
                <td class="text-center fw-bold">Create_at</td>
                <td class="text-center fw-bold">Update</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listProducts as $value):  ?>
            <tr>
                <td class="text-center">{{ $value->id }}</td>
                <td class="text-center">{{ $value->name }}</td>
                <td class="text-center">{{ $value->price }}</td>
                <td class="text-center">{{ $value->view }}</td>
                <td class="text-center">{{ $value->category_id }}</td>
                <td class="text-center">{{ $value->create_at }}</td>
                <td class="text-center">{{ $value->update_at }}</td>
                <td>
                    <a href="{{ route('products.editProducts', $value->id) }}"><button
                            class="btn btn-warning">Edit</button></a>
                    <a href="{{ route('products.delProducts', $value->id) }}"><button
                            class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
@endsection
