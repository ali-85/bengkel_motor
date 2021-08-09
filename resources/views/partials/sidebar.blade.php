<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Bengkel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('img/'.Auth::user()->profile )}}" class="img-circle elevation-2" alt="User Image">
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
            <a href=@if(Auth::user()->role == 1) "{{ route('admin.index') }}" @else "{{ route('cashier.index') }}"  @endif class="nav-link {{ (request()->segment(2) == '') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth()->check() && Auth::user()->role == 1)
          <li class="nav-item">
            <a href="{{ route('admin.cashier') }}" class="nav-link {{ (Request::segment(2) == 'cashier') ? 'active':'' }}">
              <i class="nav-icon fas fa-fw fa-user"></i> 
              <p>
                Cashier
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.part') }}" class="nav-link {{ (Request::segment(2) == 'parts') ? 'active':'' }}">
              <i class="fas fa-cogs nav-icon"></i>
              <p>Parts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('show.trx') }}" class="nav-link {{ (Request::segment(3) == 'transaction') ? 'active':'' }}">
              <i class="fas fa-th-list nav-icon"></i>
              <p>Transaction</p>
            </a>
          </li>
          @else
            <li class="nav-item">
              <a href="{{ route('cashier.transaction') }}" class="nav-link {{ (Request::segment(2) == 'transaction') ? 'active':'' }}">
                <i class="far fa-fw fa-list-alt"></i> 
                <p>
                  Transaction
                </p>
              </a>
            </li>
            @endif
          <div class="dropdown-divider"></div>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="fas fa-fw fa-sign-out-alt"></i> 
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>