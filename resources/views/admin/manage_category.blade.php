@extends('admin/layout')
@section('category_select','active')
@section('page_title','Manage Category')
@section('container')
    <h1 class="text-center">Manage Category</h1>
    <a href="{{url('admin/category')}}">
        <button type="button" class="btn btn-primary mb-2">Back</button>
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{route('category.manage_category_process')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_name" class="control-label mb-1">Category Name</label>
                    <input id="category_name" name="category_name" type="text"
                           class="form-control" aria-required="true" aria-invalid="false"
                           value="{{$category_name}}" required>
                    @error('category_name')
                        <div class='alert alert-danger mt-3'>
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_slug" class="control-label mb-1">Category Slug</label>
                    <input id="category_slug" name="category_slug" type="text"
                           class="form-control" aria-required="true" aria-invalid="false"
                           value="{{$category_slug}}" required>
                    @error('category_slug')
                    <div class='alert alert-danger mt-3'>
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
                </div>
                <input type="hidden" name="id" value="{{$id}}">
            </form>
        </div>
    </div>

@endsection
