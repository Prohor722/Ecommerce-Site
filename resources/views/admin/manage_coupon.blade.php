@extends('admin/layout')
@section('coupon_select','active')
@section('page_title','Manage Coupon')
@section('container')
    <h1 class="text-center">Manage Coupon</h1>
    <a href="{{url('admin/coupon')}}">
        <button type="button" class="btn btn-primary mb-2">Back</button>
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{route('coupon.manage_coupon_process')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title" class="control-label mb-1">Coupon Title</label>
                    <input id="title" name="title" type="text"
                           class="form-control" aria-required="true" aria-invalid="false"
                           value="{{$title}}" required>
                    @error('title')
                    <div class='alert alert-danger mt-3'>
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="code" class="control-label mb-1">Coupon Code</label>
                    <input id="code" name="code" type="text"
                           class="form-control" aria-required="true" aria-invalid="false"
                           value="{{$code}}" required>
                    @error('code')
                    <div class='alert alert-danger mt-3'>
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="value" class="control-label mb-1">Coupon Value</label>
                    <input id="value" name="value" type="text"
                           class="form-control" aria-required="true" aria-invalid="false"
                           value="{{$value}}" required>
                    @error('value')
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
