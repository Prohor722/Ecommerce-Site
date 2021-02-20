@extends('admin/layout')
@section('color_select','active')
@section('page_title','Manage Color')
@section('container')
    <h1 class="text-center">Manage Color</h1>
    <a href="{{url('admin/color')}}">
        <button type="button" class="btn btn-primary mb-2">Back</button>
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{route('color.manage_color_process')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="color" class="control-label mb-1">Color</label>
                    <input id="color" name="color" type="text"
                           class="form-control" aria-required="true" aria-invalid="false"
                           value="{{$color}}" required>
                    @error('color')
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
