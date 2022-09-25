@extends('admin.layouts.app')

@section('title')
Colab List
@endsection

@section('content')


<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Colab List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Colab List</li>
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
                        <th scope="10px">Date</th>
                        <th scope="10px">Name</th>
                        <th scope="10px">Note</th>
                        <th scope="10px">CashApp Limit</th>
                        <th scope="10px">Image 1</th>
                        <th scope="10px">Image 2</th>
                        <th scope="10px">Crime</th>
                        <th scope="10px">Score</th>
                        <th scope="10px">Number</th>
                        <th scope="10px">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @empty($products)
                            <tr>
                                Empty
                            </tr>
                        @else
                            @foreach($products as $a => $num)
                                <tr>
                                    <td>{{$a+1}}</td>
                                    <td data-editable="false">
                                      {{date_format($num->created_at, 'M d,Y H:i:s')}}
                                    </td>
                                    <td data-editable="false">
                                      {{ucwords($num->extra_2)}}
                                    </td>
                                    <td class="class" data-id="{{$num->id}}">
                                      {{($num->note)}}
                                    </td>
                                    <td data-editable="false">
                                        @if($num->cash_app_send_limit == 'yes')
                                            <span class="badge badge-success">{{ucwords($num->cash_app_send_limit)}}</span>
                                        @else
                                            <span class="badge badge-danger">{{ucwords($num->cash_app_send_limit)}}</span>
                                        @endif
                                    </td>
                                    <td data-editable="false">                           
                                      @if(!empty($num->image_1) && fileExists($num->image_1,'form-images'))
                                          <img src="{{asset('images/form-images/'.$num->image_1)}}" alt="" class="form-image">
                                      @endif
                                    </td>
                                    <td data-editable="false">                                 
                                      @if(!empty($num->image_2) && fileExists($num->image_2,'form-images'))
                                          <img src="{{asset('images/form-images/'.$num->image_2)}}" alt="" class="form-image">
                                      @endif
                                    </td>
                                    <td data-editable="false">                                        
                                        @if($num->crime == 'yes')
                                            <span class="badge badge-success">{{ucwords($num->crime)}}</span>
                                        @else
                                            <span class="badge badge-danger">{{ucwords($num->crime)}}</span>
                                        @endif
                                    </td>
                                    <td data-editable="false">                                        
                                        @if($num->extra_1 == 'yes')
                                            <span class="badge badge-success">{{ucwords($num->extra_1)}}</span>
                                        @else
                                            <span class="badge badge-danger">{{ucwords($num->extra_1)}}</span>
                                        @endif
                                    </td>
                                    <td data-editable="false">
                                      <a href="tel:{{$num->phone_number}}">
                                        {{$num->phone_number}}
                                      </a>
                                    </td>
                                    <td class="d-flex">
                                        {{-- <a href="{{route('products.edit',[$b->id])}}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                                        <form id="delete-form-{{$b->id}}" action="{{ route('products.destroy' , $b->id)}}" method="POST">
                                          @csrf
                                          <input type="hidden" name="_method" value="DELETE" />
                                          <button class="btn btn-danger delete-item" data-form="#delete-form-{{$b->id}}"><i class="fas fa-trash"></i></button>
                                        </form> --}}
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