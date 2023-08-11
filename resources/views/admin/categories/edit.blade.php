@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Category') }}</div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('admin.categories.update',['id' => $category->id_uuid]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ !is_null(old('title')) ? old('title') : $category->title  }}"
                                           required
                                           autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="parent_category"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Parent Category') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" name="parent_category">
                                        <option value="">Main Category</option>
                                        @foreach($categories as $item)
                                            <option
                                                @if($item->id_uuid === $category->parent_category_id_uuid) selected
                                                @endif value="{{$item->id_uuid}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>

                                    @error('parent_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-warning">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
