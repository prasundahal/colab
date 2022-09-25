@extends('admin.layouts.app')

@section('title')
Messages List
@endsection

@section('content')
<style>
  .active-item{
    background: gainsboro;
  }
</style>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="message-page-title">Inbox</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active active-bread">Inbox</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="javascript:void(0);" class="btn btn-primary btn-block mb-3 compose-message">Compose</a>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Folders</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item active-item">
              <a href="javascript:void(0);" class="nav-link message-inbox">
                <i class="fas fa-inbox"></i> Inbox
                  @php
                    $new_message_count = getNewMessagesCount();
                  @endphp
                  @if($new_message_count > 0)
                    <span class="badge bg-primary float-right">
                      {{$new_message_count}}
                    </span>
                  @endif
                
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-envelope"></i> Sent
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-trash-alt"></i> Trash
              </a>
            </li>
          </ul>
        </div>

      </div>

    </div>
    
    <div class="col-md-9 message-div-main">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Inbox</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm">
              <input type="text" class="form-control search-mail" placeholder="Search Mail">
              <div class="input-group-append">
                <div class="btn btn-primary">
                  <i class="fas fa-search"></i>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="card-body p-0">
          <div class="mailbox-controls">

            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm delete-message-bulk">
                <i class="far fa-trash-alt"></i>
              </button>
              <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-reply"></i>
              </button>
              <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-share"></i>
              </button>
            </div>

            <button type="button" class="btn btn-default btn-sm">
              <i class="fas fa-sync-alt"></i>
            </button>
            <div class="float-right">
              {{-- 1-50/200 --}}
              <div class="btn-group">
                  {{-- {{ $items->links() }} --}}
                {{-- <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-chevron-right"></i>
                </button> --}}
              </div>

            </div>

          </div>
          <div class="table-responsive mailbox-messages">
            @include('admin.message.partials.list',['items' => $items])
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
      $('.compose-message').click(function () {
        console.log('asd');
        $.ajax({
            url:"/admin/compose-message",
            method: 'GET',
            beforeSend: function() {
              $('.message-div-main').html('<div class="loader"></div>');
              // $('.mailbox-messages').html('<div class="loader"></div>');
            },
            success:function(data)
            {
              $('.message-div-main').html(data);
            }
          });
      });
      $('.message-inbox').click(function () {
        $.ajax({
            url:"/admin/messages",
            method: 'GET',
            beforeSend: function() {
              $('.message-div-main').html('<div class="loader"></div>');
              // $('.mailbox-messages').html('<div class="loader"></div>');
            },
            success:function(data)
            {
              $('.message-div-main').html(data);
            }
          });
      });
      
      $('.delete-message-bulk').click(function () {
        var activePage = $('li.page-item.active span').text();

        var selected = [];
        $('.message-list-body input:checked').each(function() {
            selected.push($(this).attr('data-id'));
        });
        if(selected.length == 0){
          toastr.error('Please Select an item');
          return;
        }
        
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
              
          $.ajax({
            url:"/admin/bulk-message-delete?page="+activePage,
            method: 'POST',
            data:{
              cids : selected
            },
            beforeSend: function() {
              // $('.mailbox-messages').html('<div class="loader"></div>');
            },
            success:function(data)
            {
              console.log(data);
              $('.mailbox-messages').html(data);
            }
          });
          }
        })
      });

      $('.checkbox-toggle').click(function () {
        var clicks = $(this).data('clicks')
        if (clicks) {
          //Uncheck all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
          $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
        } else {
          //Check all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
          $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
        }
        $(this).data('clicks', !clicks)
      });

        $('.show-item').on('click',function(){
          var itemType = "message";
          var titleText = 'Message Show';
          
          var id = $(this).data('id');
          var toggleElement = '.message-status-'+id;
          var url = '/admin/messages/'+id;
          // var itemId = $(this).data('itemId');
          showItem(url,titleText,itemType,toggleElement);
        });
        
         $(document).on('keyup', '.search-mail', function(event){
            event.preventDefault(); 
            var page = $(this).text();
            var search = $(this).val();
            
            $.ajax({
            url:"/admin/messages?page="+page+"&&name="+search,
            beforeSend: function() {
               $('.mailbox-messages').html('<div class="loader"></div>');
            },
            success:function(data)
            {
              $('.search-mail').val(search);
              $('.mailbox-messages').html(data);
            }
            });
          });

         $(document).on('click', '.page-link', function(event){
            event.preventDefault(); 
            var page = $(this).text();

            
            $.ajax({
              url:"/admin/messages?page="+page,
              beforeSend: function() {
                $('.mailbox-messages').html('<div class="loader"></div>');
              },
              success:function(data)
              {
                $('.mailbox-messages').html(data);
              }
            });
          });

      });
    </script>
@endsection