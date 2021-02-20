@extends('admin/layout')
@section('size_select','active')
@section('page_title','Size')
@section('container')
    <h1 class="text-center">Size</h1>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <a href="{{url('admin/size/manage_size')}}">
        <button type="button" class="btn btn-success mb-2">Add Size</button>
    </a>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Size</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->size}}</td>
                    <td>
                        <a href="{{url("admin/size/manage_size/$list->id")}}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        @if($list->status==1)
                            <a href="{{url("admin/size/status/0/$list->id")}}">
                                <button class="btn btn-success">Active</button>
                            </a>
                        @else
                            <a href="{{url("admin/size/status/1/$list->id")}}">
                                <button class="btn btn-dark">Deactive</button>
                            </a>
                        @endif
                        <a href="{{url("admin/size/delete/$list->id")}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
