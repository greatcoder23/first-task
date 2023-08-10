@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="m-1 text-end">
                <a class="btn btn-sm btn-outline-info" href="{{ route('admin.categories.indexTree') }}">Tree View </a>
                <a class="btn btn-sm btn-outline-info" href="{{ route('admin.categories.create') }}">Add Category</a>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Parent Category</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $cnt = 1; @endphp
                        @forelse($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ $cnt++ }}</th>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->parent_category_id_uuid ? $category->parentCategory->title  : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">No data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
