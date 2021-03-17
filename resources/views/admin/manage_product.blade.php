@extends('admin/layout')
@section('product_select','active')
@section('page_title','Manage Product')
@section('container')
    <h1 class="text-center">Manage Product</h1>
    <a href="{{url('admin/product')}}">
        <button type="button" class="btn btn-primary mb-2">Back</button>
    </a>

    <div class="card">
        <div class="card-body">
            <form action="{{route('product.manage_product_process')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Product Name</label>
                            <input id="name" name="name" type="text"
                                   class="form-control" aria-required="true" aria-invalid="false"
                                   value="{{$name}}" required>
                            @error('name')
                            <div class='alert alert-danger mt-3'>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="slug" class="control-label mb-1">Product Slug</label>
                            <input id="slug" name="slug" type="text"
                                   class="form-control" aria-required="true" aria-invalid="false"
                                   value="{{$slug}}" required>
                            @error('slug')
                            <div class='alert alert-danger mt-3'>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image" class="control-label mb-1">Product Image</label>
                            <input id="file" name="file" type="file"
                                   class="form-control" aria-required="true" aria-invalid="false"
                                   value="{{$image}}">
                            @error('image')
                            <div class='alert alert-danger mt-3'>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="category_id" class="control-label mb-1">Category</label>
                            <select id="category_id" name="category_id" type="text"
                                    class="form-control" aria-required="true" aria-invalid="false"
                                    value="{{$category_id}}" required>
                                <option value="">Select Category</option>
                                @foreach($category as $list)
                                    @if($category_id==$list->id)
                                        <option selected value="{{$list->id}}">
                                    @else
                                        <option value="{{$list->id}}">
                                    @endif
                                    {{$list->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="brand" class="control-label mb-1">Brand</label>
                            <input id="brand" name="brand" type="text"
                                   class="form-control" aria-required="true" aria-invalid="false"
                                   value="{{$brand}}" required>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="model" class="control-label mb-1">Model</label>
                                <input id="model" name="model" type="text"
                                       class="form-control" aria-required="true" aria-invalid="false"
                                       value="{{$model}}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="short_desc" class="control-label mb-1">Short Description</label>
                            <textarea id="short_desc" name="short_desc" type="text"
                                   class="form-control" aria-required="true" aria-invalid="false"
                                      required>{{$short_desc}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desc" class="control-label mb-1">Description</label>
                            <textarea id="desc" name="desc" type="text"
                                      class="form-control" aria-required="true" aria-invalid="false"
                                      required>{{$desc}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="keywords" class="control-label mb-1">Keywords</label>
                            <textarea id="keywords" name="keywords" type="text"
                                      class="form-control" aria-required="true" aria-invalid="false"
                                      required>{{$keywords}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="technical_specification" class="control-label mb-1">Technical_specification</label>
                            <textarea id="technical_specification" name="technical_specification" type="text"
                                      class="form-control" aria-required="true" aria-invalid="false"
                                      required>{{$technical_specification}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="uses" class="control-label mb-1">Uses</label>
                            <textarea id="uses" name="uses" type="text"
                                      class="form-control" aria-required="true" aria-invalid="false"
                                      required>{{$uses}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="warranty" class="control-label mb-1">Warranty</label>
                            <textarea id="warranty" name="warranty" type="text"
                                      class="form-control" aria-required="true" aria-invalid="false"
                                      required>{{$warranty}}</textarea>
                        </div>
                    </div>
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
