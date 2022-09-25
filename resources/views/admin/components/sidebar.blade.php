
            <div class="sidebar">
               <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                     <a href="#" class="d-block">Alexander Pierce</a>
                  </div>
               </div> -->
               <div class="form-inline">
                  <div class="input-group" data-widget="sidebar-search">
                     <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                     <div class="input-group-append">
                        <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                        </button>
                     </div>
                  </div>
               </div>
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link {{(Request::segment(2) == 'dashboard')?'active':''}}">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item {{(Request::segment(2) == 'users')?'menu-open':''}}">
                        <a href="#" class="nav-link {{(Request::segment(2) == 'users')?'active':''}}">
                           <i class="nav-icon fas fa-user"></i>
                           <p>
                              Users
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">   
                              <a href="{{route('users.index')}}" class="nav-link {{((Request::segment(2) == 'users') && (Request::segment(3) == ''))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Users List</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{route('users.create')}}" class="nav-link {{((Request::segment(2) == 'users') && (Request::segment(3) == 'create'))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add User</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item {{(Request::segment(2) == 'products')?'menu-open':''}}">
                        <a href="#" class="nav-link {{(Request::segment(2) == 'products')?'active':''}}">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                              Product
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">   
                              <a href="{{route('products.index')}}" class="nav-link {{((Request::segment(2) == 'products') && (Request::segment(3) == ''))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Products List</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{route('products.create')}}" class="nav-link {{((Request::segment(2) == 'products') && (Request::segment(3) == 'create'))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Product</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item {{(Request::segment(2) == 'testimonials')?'menu-open':''}}">
                        <a href="#" class="nav-link {{(Request::segment(2) == 'testimonials')?'active':''}}">
                           <i class="nav-icon fas fa-users"></i>
                           <p>
                              Testimonials
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">   
                              <a href="{{route('testimonials.index')}}" class="nav-link {{((Request::segment(2) == 'testimonials') && (Request::segment(3) == ''))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Testimonials List</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="{{route('testimonials.create')}}" class="nav-link {{((Request::segment(2) == 'testimonials') && (Request::segment(3) == 'create'))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add Testimonial</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item {{(Request::segment(2) == 'faq')?'menu-open':''}}">
                        <a href="#" class="nav-link {{(Request::segment(2) == 'faq')?'active':''}}">
                           <i class="nav-icon fas fa-question-circle"></i>
                           <p>
                              FAQ
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">   
                              <a href="{{route('faq.index')}}" class="nav-link {{((Request::segment(2) == 'faq') && (Request::segment(3) == ''))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>FAQ List</p>
                              </a>
                           </li> 
                           <li class="nav-item">
                              <a href="{{route('faq.create')}}" class="nav-link {{((Request::segment(2) == 'faq') && (Request::segment(3) == 'create'))?'active':''}}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add FAQ</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('messages.index')}}" class="nav-link {{(Request::segment(2) == 'messages')?'active':''}}">
                           <i class="nav-icon far fa-envelope"></i>
                           <p>
                              Messages
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('settings.index')}}" class="nav-link {{(Request::segment(2) == 'settings')?'active':''}}">
                           <i class="nav-icon fa fa-cog"></i>
                           <p>
                              Settings
                           </p>
                        </a>
                     </li>
                     <!-- <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="index-2.html" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard v1</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="index2.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard v2</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="index3.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard v3</p>
                              </a>
                           </li>
                        </ul>
                     </li> -->
                  </ul>
               </nav>
            </div>