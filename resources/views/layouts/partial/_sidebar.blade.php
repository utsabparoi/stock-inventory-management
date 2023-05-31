  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <!-- <a href="#" class="d-block">Alexander Pierce</a> -->
          <a href="#" class="d-block">{{ Auth::user()->name ?? 'Guest User'}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                  <i class="fa fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('stocks.index') }}" class="nav-link {{ request()->is('stocks*') ? 'active' : '' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('about_us.index') }}" class="nav-link {{ request()->is('about_us*') ? 'active' : '' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contact_list') }}" class="nav-link {{ request()->is('contact_us*') ? 'active' : '' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Contact Us</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                              this.closest('form').submit();">
                      <i class="nav-icon fa fa-sign-out-alt"></i> {{ __('Log Out') }}
                  </a>
              </form>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
