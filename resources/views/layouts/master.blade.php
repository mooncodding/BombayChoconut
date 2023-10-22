
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://fontawesome.com/releases/v5.15/css/all.css"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name='locale' content='{{app()->getLocale()}}' />
  <title>{{ App\Models\Setting::first()->company_name }}</title>
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper" id="app">
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <router-link to="/dashboard" class="nav-link">{{ __('translation.Dashboard') }}</router-link>
        </li>
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        {{-- Language Picker --}}
        <li class="nav-item dropdown">
        </li>
        {{-- End Language Picker --}}
        <!-- Messages Dropdown Menu -->
        <!--<li class="nav-item dropdown">-->
        <!--  <a class="nav-link" data-toggle="dropdown" href="#">-->
        <!--    <i class="far fa-comments"></i>-->
        <!--    <span class="badge badge-danger navbar-badge">3</span>-->
        <!--  </a>-->
        <!--  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">-->
        <!--    <a href="#" class="dropdown-item">-->
             
        <!--      <div class="media">-->
        <!--        <img src="{{asset('img')}}/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">-->
        <!--        <div class="media-body">-->
        <!--          <h3 class="dropdown-item-title">-->
        <!--            Brad Diesel-->
        <!--            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>-->
        <!--          </h3>-->
        <!--          <p class="text-sm">Call me whenever you can...</p>-->
        <!--          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>-->
        <!--        </div>-->
        <!--      </div>-->
              
        <!--    </a>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="#" class="dropdown-item">-->
           
        <!--      <div class="media">-->
        <!--        <img src="{{asset('img')}}/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">-->
        <!--        <div class="media-body">-->
        <!--          <h3 class="dropdown-item-title">-->
        <!--            John Pierce-->
        <!--            <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>-->
        <!--          </h3>-->
        <!--          <p class="text-sm">I got your message bro</p>-->
        <!--          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>-->
        <!--        </div>-->
        <!--      </div>-->
             
        <!--    </a>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="#" class="dropdown-item">-->
             
        <!--      <div class="media">-->
        <!--        <img src="{{asset('img')}}/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">-->
        <!--        <div class="media-body">-->
        <!--          <h3 class="dropdown-item-title">-->
        <!--            Nora Silvester-->
        <!--            <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>-->
        <!--          </h3>-->
        <!--          <p class="text-sm">The subject goes here</p>-->
        <!--          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>-->
        <!--        </div>-->
        <!--      </div>-->
             
        <!--    </a>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>-->
        <!--  </div>-->
        <!--</li>-->
        <!-- Notifications Dropdown Menu -->
        <!--<li class="nav-item dropdown">-->
        <!--  <a class="nav-link" data-toggle="dropdown" href="#">-->
        <!--    <i class="far fa-bell"></i>-->
        <!--    <span class="badge badge-warning navbar-badge">15</span>-->
        <!--  </a>-->
        <!--  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">-->
        <!--    <span class="dropdown-header">15 Notifications</span>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="#" class="dropdown-item">-->
        <!--      <i class="fas fa-envelope mr-2"></i> 4 new messages-->
        <!--      <span class="float-right text-muted text-sm">3 mins</span>-->
        <!--    </a>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="#" class="dropdown-item">-->
        <!--      <i class="fas fa-users mr-2"></i> 8 friend requests-->
        <!--      <span class="float-right text-muted text-sm">12 hours</span>-->
        <!--    </a>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="#" class="dropdown-item">-->
        <!--      <i class="fas fa-file mr-2"></i> 3 new reports-->
        <!--      <span class="float-right text-muted text-sm">2 days</span>-->
        <!--    </a>-->
        <!--    <div class="dropdown-divider"></div>-->
        <!--    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
        <!--  </div>-->
        <!--</li>-->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <!--<a href="index3.html" class="brand-link">-->
      <!--  @if(file_exists('images/logo/'.App\Models\Setting::first()->logo))-->
      <!--  <img src="{{asset('images/logo/'.App\Models\Setting::first()->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <!--  @else-->
      <!--  <img src="{{asset('images/logo/'.App\Models\Setting::first()->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <!--  @endif-->
      <!--</a> -->
      <!--  <span class="brand-text font-weight-light">{{ App\Models\Setting::first()->company_name }}</span>-->
      
      <a href="" class="brand-link text-center"><img src="{{asset('images/logo/'.App\Models\Setting::first()->logo)}}" alt="AdminLTE Logo" style="width:25%"></a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if(file_exists('images/users/'.Auth::user()->photo))
            <img src="{{ asset('images/users/'.Auth::user()->photo) }}" class="img-circle elevation-2" alt="User Image">
            @else
              <img src="{{ asset('images/users/profile.png') }}" class="img-circle elevation-2" alt="User Image">
            @endif
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
              <router-link to="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>{{ __('translation.Dashboard') }}</p>
              </router-link>
            </li>
            {{-- MENU --}}
            {{-- @canany(['orders','order_payments','expenses','stock_entries','stock_adjustments', 'campaigns'])
            <li class="nav-item menu-close">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  {{ __('translation.Menu') }}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview"> --}}
              {{-- Orders --}}
              {{-- @can('orders')
                <li class="nav-item">
                  <router-link to="/orders" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.Orders') }}</p>
                  </router-link>
                </li>
              @endcan --}}
              
              {{-- Order Payments --}}
              {{-- @can('order_payments')
              <li class="nav-item">
                <router-link to="/orderPayments" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('translation.OrderPayments') }}</p>
                </router-link>
                </li>
              @endcan --}}
              
              {{-- Expenses --}}
              {{-- @can('expenses')
                  <li class="nav-item">
                    <router-link to="/expenses" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ __('translation.Expenses') }}</p>
                    </router-link>
                  </li>
              @endcan --}}
            
              {{-- Stock Entries 
              @can('stock_entries')
                <li class="nav-item">
                  <router-link to="/stockEntries" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.StockEntries') }}</p>
                  </router-link>
                </li>
              @endcan--}}
              
              {{-- Stock Adjustments 
              @can('stock_adjustments')
                <li class="nav-item">
                  <router-link to="/stockAdjustments" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.StockAdjustments') }}</p>
                  </router-link>
                </li>
              @endcan--}}
              
              {{-- Campaigns --}}
              {{-- @can('campaigns')
                <li class="nav-item">
                  <router-link to="/campaigns" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.Campaigns') }}</p>
                  </router-link>
                </li> --}}
              {{-- @endcan --}}
              {{-- General Push Notifications --}}
              {{-- @can('general_push_notifications')
                <li class="nav-item">
                  <router-link to="/generalPushNotifications" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.GeneralPushNotifications') }}</p>
                  </router-link>
                </li>
              @endcan
              
              </ul>
            </li>
            @endcanany --}}
            
            {{-- MANAGE --}}
            @canany(['product_categories','products'])
            <li class="nav-item menu-close">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-folder"></i>
                <p>
                  {{ __('translation.Manage') }}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview"> 
              {{-- Product Categories --}}
                @can('product_categories')
                  <li class="nav-item">
                    <router-link to="/productCategories" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ __('translation.ProductCategories') }}</p>
                    </router-link>
                  </li>
                @endcan
                @can('product_flavours')
                  <li class="nav-item">
                    <router-link to="/productFlavours" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ __('translation.ProductFlavours') }}</p>
                    </router-link>
                  </li>
                @endcan
                @can('products')
                <li class="nav-item">
                  <router-link to="/products" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.Products') }}</p>
                  </router-link>
                </li>
                @endcan
               </ul>
            </li>
            @endcanany
            
            {{-- PEOPLE --}}
            @canany(['system_users','customers'])
            <li class="nav-item menu-close">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  {{ __('translation.People') }}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('users')
                    <li class="nav-item">
                      <router-link to="/users" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>{{ __('translation.Users') }}</p>
                      </router-link>
                    </li>
                @endcan
                {{-- @can('system_users')
                    <li class="nav-item">
                      <router-link to="/systemUsers" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>{{ __('translation.SystemUsers') }}</p>
                      </router-link>
                    </li>
                @endcan
                @can('customers')
                    <li class="nav-item">
                      <router-link to="/customers" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>{{ __('translation.Customers') }}</p>
                      </router-link>
                    </li>
                @endcan --}}
                </ul>
            </li>
            @endcanany
            
            {{--Reports --}}
            {{-- @canany(['customer_report','stock_adjustment_report','orders_report','stock_report'])
            <li class="nav-item menu-close">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>
                  {{ __('translation.Reports') }}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a> --}}
              {{-- <ul class="nav nav-treeview"> --}}
              {{-- Customer --}}
                {{-- @can('customer_report')
                <li class="nav-item">
                  <router-link to="/customerReport" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.CustomerReport') }}</p>
                  </router-link>
                </li>
                @endcan --}}
              {{-- Stock Adjustment Report 
                @can('stock_adjustment_report')
                <li class="nav-item">
                  <router-link to="/stockAdjustmentReport" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.StockAdjustmentReport') }}</p>
                  </router-link>
                </li>
                @endcan--}}
              {{-- Orders Report --}}
                {{-- @can('orders_report')
                <li class="nav-item">
                  <router-link to="/ordersReport" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.OrdersReport') }}</p>
                  </router-link>
                </li>
                @endcan --}}
              {{-- Stock Report --}}
                {{-- @can('stock_report')
                <li class="nav-item">
                  <router-link to="/stockReport" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.StockReport') }}</p>
                  </router-link>
                </li>
                @endcan
              </ul>
            </li>
            @endcanany --}}
            
            {{-- SETTINGS --}}
            @canany(['roles','permissions','application','profile'])
            <li class="nav-item menu-close">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-cogs"></i>
                <p>
                  {{ __('translation.Settings') }}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              {{-- Profile --}}
                @can('profile')
                  <li class="nav-item">
                    <router-link to="/profile" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{ __('translation.Profile') }}</p>
                    </router-link>
                  </li>
                @endcan
                
              {{-- Roles --}}
                @can('roles')
                <li class="nav-item">
                  <router-link to="/roles" class="nav-link">
                    <i class="fa fa-key nav-icon"></i>
                    <p>{{ __('translation.Roles') }}</p>
                  </router-link>
                </li>
                @endcan

                {{-- Permissions --}}
                @can('permissions')
                <li class="nav-item">
                  <router-link to="/permissions" class="nav-link">
                    <i class="fa fa-key nav-icon"></i>
                    <p>{{ __('translation.Permissions') }}</p>
                  </router-link>
                </li>
                @endcan

                {{-- Application --}}
                @can('application')
                <li class="nav-item">
                  <router-link to="/settings" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('translation.Application') }}</p>
                  </router-link>
                </li>
                @endcan
              </ul>
            </li>
            @endcanany
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                <i class="nav-icon fas fa-power-off"></i>
                  <p>{{ __('translation.Logout') }}</p>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->
  
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Developped by <a href="#">Vivotic Solucions</a>
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; {{ now()->year }} Bombay Choconuts</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

@auth
  <script>
    window.Gate = {
        csrfToken: "{{ csrf_token() }}",
        userPermissions: {!! auth()->check()?auth()->user()->getAllPermissionsAttribute():null !!}
    }
  </script>
@endauth
<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>
{{-- Chart cdn --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</body>
</html>
