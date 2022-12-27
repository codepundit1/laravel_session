@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h1 class="text-center">Sub Category List</h1>
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
                                    <th scope="col">Slug</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sub_category->name }}</td>
                                        <td>{{ $sub_category->slug }}</td>
                                        <td>{{ $sub_category->category->name}}</td>

                                        <td class="d-flex">
                                            <div class="flex-column me-1">
                                                <a href="{{ route('sub-categories.edit', $sub_category) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('sub-categories.destroy', $sub_category) }}" method="post"
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

                        <a href="{{ route('sub-categories.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
