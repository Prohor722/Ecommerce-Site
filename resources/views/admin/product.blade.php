@extends('admin/layout')
@section('product_select','active')
@section('page_title','Product')
@section('container')
    <h1 class="text-center">Product</h1>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <a href="{{url('admin/product/manage_product')}}">
        <button type="button" class="btn btn-success mb-2">Add Product</button>
    </a>
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->slug}}</td>
                    <td>
                        <a href="{{url("admin/product/manage_product/$list->id")}}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        @if($list->status==1)
                            <a href="{{url("admin/product/status/0/$list->id")}}">
                                <button class="btn btn-success">Active</button>
                            </a>
                        @else
                            <a href="{{url("admin/product/status/1/$list->id")}}">
                                <button class="btn btn-dark">Deactive</button>
                            </a>
                        @endif
                        <a href="{{url("admin/product/delete/$list->id")}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
