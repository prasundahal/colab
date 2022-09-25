@extends('admin.layouts.app')

@section('title')
{{ucwords(Request::segment(2)).'-'. (!empty(Request::segment(3))?ucwords(Request::segment(3)):ucwords(Request::segment(2)))}}
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ucwords(Request::segment(2)).'-'. (!empty(Request::segment(3))?ucwords(Request::segment(3)):ucwords(Request::segment(2)))}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{ucwords(Request::segment(2)).' '. ucwords(Request::segment(3))}}</li>
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
                    <form action="{{route('faq.store')}}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Question</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Question" name="question" value="">
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea class="form-control" name="answer" id="answer" cols="30" rows="10" placeholder="Enter Answer"></textarea>
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