@extends('admin/layout')
@section('category_select','active')
@section('page_title','Category')
@section('container')
    <h1 class="text-center">Category</h1>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <a href="{{url('admin/category/manage_category')}}">
        <button type="button" class="btn btn-success mb-2">Add Category</button>
    </a>
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->category_name}}</td>
                    <td>{{$list->category_slug}}</td>
                    <td>
                        <a href="{{url("admin/category/manage_category/$list->id")}}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        @if($list->status==1)
                            <a href="{{url("admin/category/status/0/$list->id")}}">
                                <button class="btn btn-success">Active</button>
                            </a>
                        @else
                            <a href="{{url("admin/category/status/1/$list->id")}}">
                                <button class="btn btn-dark">Deactive</button>
                            </a>
                        @endif
                        <a href="{{url("admin/category/delete/$list->id")}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
