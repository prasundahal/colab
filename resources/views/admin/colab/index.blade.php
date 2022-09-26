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
                        <th scope="10px">Number</th>
                        <th scope="10px">Note</th>
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
                                      {{ucwords($num->name)}}
                                    </td>
                                    <td data-editable="false">
                                      <a href="tel:{{$num->phone_number}}">
                                        {{$num->phone_number}}
                                      </a>
                                    </td>
                                    <td class="class" data-id="{{$num->id}}">
                                      {{($num->note)}}
                                    </td>
                                    <td class="d-flex">
                                      <a href="javascript:void(0);" class="btn btn-primary view-colab" data-name="{{$num->name}}" data-phone_number="{{$num->phone_number}}" data-id="{{$num->id}}">
                                        <i class="fas fa-eye"></i> 
                                      </a>
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
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">

          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>

      </div>
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
      $('.view-colab').on('click',function(){
        $('#modal-default').modal('show');
        var name = $(this).attr('data-name');
        var phone_number = $(this).attr('data-phone_number');
        var cid = $(this).attr('data-id');
        $('.modal-title').text(name + '-' + phone_number);
        var url = base_url + "/admin/colab/detail/" + cid;
        console.log(url);
        $.get(url, function(data) {
            $('.modal-body').html(data);
        });
      });

      $(document).ready( function () {
       $('table').editableTableWidget();
       
       $('table td').on('change', function(evt, newValue) {
        var type = "POST";
        
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
             $.ajax({
                type: type,
                url: base_url + "/admin/colab/saveNote",
                data: {
                    "cid": $(this).data('id'),
                    "note" : newValue
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    toastr.success('Success',"Note Saved");
                    
                },
                error: function (data) {
                    console.log(data);
                    toastr.error('Error',data.responseText);
                }
            });
           });
    });
    </script>
@endsection