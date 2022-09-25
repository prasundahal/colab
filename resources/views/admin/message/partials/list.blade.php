

  
         
            <table class="table table-hover table-striped">
              <tbody class="message-list-body">
                  @empty($items)
                      <tr>
                          Empty
                      </tr>
                  @else
                      @foreach($items as $a => $b)
                      <tr>
                          <td>
                            <div class="icheck-primary">
                                <input data-id="{{$b->id}}" type="checkbox" value="" id="check-{{$b->id}}" name="selectMessage[]">
                                <label for="check-{{$b->id}}"></label>
                            </div>
                          </td>
                          <td class="mailbox-name"><a href="read-mail.html">{{$b->name}}</a></td>
                          <td class="mailbox-subject"><b>{{($b->subject != '')?$b->subject:''}}</b> -  {{strlen($b->message) > 50 ? substr($b->message,0,50)."..." : $b->message}}
                          </td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">{{time_elapsed_string($b->created_at)}}</td>
                      </tr>
                      @endforeach
                  @endif   
              </tbody>
              </table>
          
            <div class="mailbox-controls">
                <div class="float-right mt-2">
                    <div class="btn-group">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
       <script>
       </script>
       @section('script')
       <script>
        
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
       </script>
       @endsection
  
      