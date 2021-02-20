@extends('admin/layout')
@section('page_title','Coupon')
@section('coupon_select','active')
@section('container')
    <h1 class="text-center">Coupon</h1>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <a href="{{url('admin/coupon/manage_coupon')}}">
        <button type="button" class="btn btn-success mb-2">Add Coupon</button>
    </a>
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
            <tr>
                <th>Coupon ID</th>
                <th>Coupon Title</th>
                <th>Coupon Code</th>
                <th>Coupon Value</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->title}}</td>
                    <td>{{$list->code}}</td>
                    <td>{{$list->value}}</td>
                    <td>
                        <a href="{{url("admin/coupon/manage_coupon/$list->id")}}">
                            <button class="btn btn-info">Edit</button>
                        </a>
                        @if($list->status==1)
                            <a href="{{url("admin/coupon/status/0/$list->id")}}">
                                <button class="btn btn-success">Active</button>
                            </a>
                        @else
                            <a href="{{url("admin/coupon/status/1/$list->id")}}">
                                <button class="btn btn-dark">Deactive</button>
                            </a>
                        @endif
                        <a href="{{url("admin/coupon/delete/$list->id")}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
