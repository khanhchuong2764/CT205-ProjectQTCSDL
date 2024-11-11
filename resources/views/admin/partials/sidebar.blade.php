<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Shop Chuong</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Khanh Chuong</a>
        </div>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-bars"></i> --}}
              <i class="nav-icon fa-solid fa-box-open"></i>
              <p>
                Sản Phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/product/create" class="nav-link">
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/product" class="nav-link">
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/category/create" class="nav-link">
                  <p>Thêm danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/category" class="nav-link">
                  <p>Danh Mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/unit" class="nav-link">
                  <p>Danh Sách Đơn Vị</p>
                </a>
              </li>
            </li><li class="nav-item">
                <a href="/admin/unit/create" class="nav-link">
                  <p>Thêm Đơn Vị</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/producers" class="nav-link">
                  <p>Danh Sách Nhà Sản Xuất</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/producers/create" class="nav-link">
                  <p>Thêm Nhà Sản Xuất</p>
                </a>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/admin/account" class="nav-link">
              <i class="nav-icon fa-brands fa-microsoft"></i>
              <p class="nav-title">
                 Danh Sách Tài Khoản
              </p>
            </a>
          </li>
        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>