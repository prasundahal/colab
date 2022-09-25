@extends('admin.layouts.app')

@section('title')
Messages List
@endsection

@section('content')


<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Messages List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Messages List</li>
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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
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
                                    <td>{{$b->name}}</td>
                                    <td>{{$b->phone}}</td>
                                    <td>{{$b->email}}</td>
                                    <td class="message-status-{{$b->id}}">
                                      @if($b->is_new == 0)
                                        <span class="btn btn-success">New</span> 
                                      @else
                                        <span class="btn btn-danger">Read</span>                                      
                                      @endif
                                    </td>
                                    <td class="d-flex">
                                        {{-- <script>
                                          var url = '/admin/messages/'+'{{$b->id}}';
                                          var titleText = 'Message Show';
                                          var itemType = 'message';
                                          var toggleElement = '.message-status-'+{{$b->id}}
                                        </script> --}}
                                        {{-- onclick="showItem(url,titleText,itemType,toggleElement);" --}}
                                        <a href="javascript:void(0);" data-id="{{$b->id}}" class="btn btn-primary mr-1 show-item"><i class="fas fa-edit"></i> </a>

                                        {{-- <a href="{{route('messages.show',[$b->id])}}" class="btn btn-primary mr-1 show-message"><i class="fas fa-edit"></i> </a> --}}
                                        <form id="delete-form-{{$b->id}}" action="{{ route('messages.destroy' , $b->id)}}" method="POST">
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

    <script>
      $(document).ready(function(){        
        $('.show-item').on('click',function(){
          var itemType = "message";
          var titleText = 'Message Show';
          
          var id = $(this).data('id');
          var toggleElement = '.message-status-'+id;
          var url = '/admin/messages/'+id;
          // var itemId = $(this).data('itemId');
          showItem(url,titleText,itemType,toggleElement);
        });
      });
    </script>
@endsection