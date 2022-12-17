@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h1 class="text-center">Product List</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SI</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->qty }}</td>

                                        <td class="d-flex">
                                            <div class="flex-column me-1">
                                                <a href="{{ route('products.edit', $product) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('products.destroy', $product) }}" method="post"
                                                class="flex-column">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?');"
                                                    id="delete" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <a href="{{ route('products.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
