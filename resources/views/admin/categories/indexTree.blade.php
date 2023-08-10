@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="m-1 text-end">
                <a class="btn btn-sm btn-outline-info" href="{{ route('admin.categories.index') }}">List
                    View </a>
                <a class="btn btn-sm btn-outline-info" href="{{ route('admin.categories.create') }}">Add Category</a>
            </div>
            <div class="col-md-10">
                <div class="card">
                    @include('admin.categories.category', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
@endsection
