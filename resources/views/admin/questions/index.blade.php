@extends('admin.layouts.app')

@section('title')
Questions List
@endsection

@section('content')


<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Questions List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Questions List</li>
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
                        <th width="100px">Question</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Yes / No</th>
                        <th>Creator</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @empty($items)
                            <tr>
                                Empty
                            </tr>
                        @else
                            @foreach($items as $a => $b)
                                <tr>
                                    <td>{{$a+1}}</td>
                                    <td>{{$b->question}}</td>
                                    <td>{{$b->name}}</td>
                                    <td>{{$b->type}}</td>
                                    <td>{{$b->yes_no}}</td>
                                    <td>{{$b->created_by}}</td>
                                    <td class="d-flex">

                                        <a href="{{route('questions.edit',[$b->id])}}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                                        <form id="delete-form-{{$b->id}}" action="{{ route('questions.destroy' , $b->id)}}" method="POST">
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