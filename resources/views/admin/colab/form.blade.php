@extends('admin.layouts.app')

@section('title')
{{ucwords(Request::segment(2)).'-'. (!empty(Request::segment(4))?ucwords(Request::segment(4)):ucwords(Request::segment(2)))}}
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ucwords(Request::segment(2)).' '. ucwords(Request::segment(4))}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{ucwords(Request::segment(2)).'-'. ucwords(Request::segment(4))}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('products.update',[$product->id])}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea class="form-control summernote" name="description" id="Description" cols="30" rows="10" placeholder="Description">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" value="">
                                @if(!empty($product->image) && fileExists($product->image,'products'))
                                    <img src="{{asset('images/products/'.$product->image)}}" alt="" class="w-100 form-image">
                                @endif
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
@endsection