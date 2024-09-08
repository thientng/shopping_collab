  <style>
    .sidebar .nav-sidebar>.nav-item.active > a.nav-link {
      background-color: rgba(255,255,255,.1);
    }
  </style>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="..../adminlte/index3.html" class="brand-link">
      <img src=" {{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-between">
        <div class="user-box  d-flex">
          <div class="image">
            <img src=" {{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
          </div>
        </div>
        <a href="{{ route('admin.logout') }}" class="d-bloc btn btn-outline-warning">
          Đăng xuất
        </a>
      </div>

      <!-- SidebarSearch Form -->
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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

          {{-- Order --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{-- active --}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Đơn hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn đặt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('order.ship') }}" class="nav-link {{-- active --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vận đơn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('order.bill') }}" class="nav-link {{-- active --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hóa đơn bán</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('order.cancel') }}" class="nav-link {{-- active --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn hủy</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Import --}}
          <li class="nav-item {{-- menu-open --}}">
            <a href="#" class="nav-link {{-- active --}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Hàng hóa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('import.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hóa đơn thêm hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('import.create') }}" class="nav-link {{-- active --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm hàng</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Product --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{-- active --}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('attributes.index') }}" class="nav-link {{-- active --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thuộc tính sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link {{-- active --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Account --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{-- active --}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tài khoản
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Người dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link {{-- active --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vai trò người dùng</p>
                </a>
              </li>
            </ul>
          </li>
          
          {{-- Media --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{-- active --}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Media
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('file_manager.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản li hình ảnh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('slider.index') }}" class="nav-link {{-- active --}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý slider</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- <li class="nav-item">
            <a href="{{ route('menus.index') }}" class="nav-link">
              <i class="fa-solid fa-landmark "></i>
              <p>
                Menus
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link">
              <i class="fa-brands fa-product-hunt"></i>
              <p>
                Setting
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

