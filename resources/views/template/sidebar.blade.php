<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <span class="brand-text font-weight-light">Selly Margaretha Sudiyandi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if ($role == 1 )
          <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link @if ($title == 'HOME' ){{'active'}} @endif">
              <i class="fas fa-home nav-icon"></i>
              <p>HOME</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('produk')}}" class="nav-link @if ($title == 'PRODUK' ){{'active'}} @endif">
              <i class="fas fa-tags nav-icon"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('outlet')}}" class="nav-link @if ($title == 'OUTLET' ){{'active'}} @endif">
              <i class="fas fa-store nav-icon"></i>
              <p>Outlet</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('diskon_h')}}" class="nav-link @if ($title == 'DISKON HEADER' ){{'active'}} @endif">
              <i class="fas fa-money-check nav-icon"></i>
              <p>Diskon Header</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('diskon_d')}}" class="nav-link @if ($title == 'DISKON DETAIL' ){{'active'}} @endif">
              <i class="fas fa-money-check-alt nav-icon"></i>
              <p>Diskon Detail</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('order_h')}}" class="nav-link @if ($title == 'ORDER HEADER' ){{'active'}} @endif">
              <i class="fas fa-cart-plus nav-icon"></i>
              <p>Order Header</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('order_d')}}" class="nav-link @if ($title == 'ORDER DETAIL' ){{'active'}} @endif">
              <i class="fas fa-cart-arrow-down nav-icon"></i>
              <p>Order Detail</p>
            </a>
          </li>
          @endif
          
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link ">
              <i class="fa fa-power-off nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>