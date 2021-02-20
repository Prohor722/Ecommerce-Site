@extends('admin/layout')
@section('size_select','active')
@section('page_title','Manage Size')
@section('container')
    <h1 class="text-center">Manage Size</h1>
    <a href="{{url('admin/size')}}">
        <button type="button" class="btn btn-primary mb-2">Back</button>
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{route('size.manage_size_process')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="size" class="control-label mb-1">Size</label>
                    <input id="size" name="size" type="text"
                           class="form-control" aria-required="true" aria-invalid="false"
                           value="{{$size}}" required>
                    @error('size')
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
