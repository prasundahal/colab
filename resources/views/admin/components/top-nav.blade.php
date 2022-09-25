
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               @php
                   $new_message_count = getNewMessagesCount();
               @endphp
               <li class="nav-item">
                  <a class="nav-link" href="#" role="button">
                     <i class="far fa-bell"></i>
                     @if($new_message_count > 0)
                        <span class="badge badge-warning navbar-badge">{{$new_message_count}}</span>
                     @endif
                  </a>
               {{-- <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                     <i class="far fa-bell"></i>
                     @if($new_message_count > 0)
                        <span class="badge badge-warning navbar-badge">{{$new_message_count}}</span>
                     @endif
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     <span class="dropdown-item dropdown-header">{{$new_message_count}} Messages</span>
                     <div class="dropdown-divider"></div>
                     <a href="#" class="dropdown-item">
                     <i class="fas fa-envelope mr-2"></i> {{$new_message_count}} new messages
                     </a>
                     <a href="{{route('messages.index')}}" class="dropdown-item dropdown-footer">See All Messages</a>
                  </div>
               </li> --}}
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('logout')}}" role="button">
                  <i class="fas fa-sign-out-alt"></i>
                  </a>
               </li>
            </ul>
         </nav>