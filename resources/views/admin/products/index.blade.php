@extends('admin.layouts.app')

@section('title')
Products List
@endsection

@section('content')


<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Products List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products List</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="10px">SN</th>
                        <th width="100px">Image</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @empty($products)
                            <tr>
                                Empty
                            </tr>
                        @else
                            @foreach($products as $a => $b)
                                <tr>
                                    <td>{{$a+1}}</td>
                                    <td>
                                      @if(!empty($b->image) && fileExists($b->image,'products'))
                                          <img src="{{asset('images/products/'.$b->image)}}" alt="" class="form-image">
                                      @endif
                                    </td>
                                    <td>{{$b->name}}</td>
                                    <td class="d-flex">

                                        <a href="{{route('products.edit',[$b->id])}}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                                        <form id="delete-form-{{$b->id}}" action="{{ route('products.destroy' , $b->id)}}" method="POST">
                                          @csrf
                                          <input type="hidden" name="_method" value="DELETE" />
                                          <button class="btn btn-danger delete-item" data-form="#delete-form-{{$b->id}}"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif                      
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

@section('script')  
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endsection