@extends('admin/layout')
@section('color_select','active')
@section('page_title','Color')
@section('container')
    <h1 class="text-center">Color</h1>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <a href="{{url('admin/color/manage_color')}}">
        <button type="button" class="btn btn-success mb-2">Add Color</button>
    </a>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Color</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->color}}</td>
                    <td>
                        <a href="{{url("admin/color/manage_color/$list->id")}}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        @if($list->status==1)
                            <a href="{{url("admin/color/status/0/$list->id")}}">
                                <button class="btn btn-success">Active</button>
                            </a>
                        @else
                            <a href="{{url("admin/color/status/1/$list->id")}}">
                                <button class="btn btn-dark">Deactive</button>
                            </a>
                        @endif
                        <a href="{{url("admin/color/delete/$list->id")}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
