 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           
            <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=danhmuc' ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh Mục Sản Phẩm
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                 Sản Phẩm
              </p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                 Đơn hàng
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                 Tài Khoản
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                 Phản Hồi
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                 Bình Luận
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                 Thoát
              </p>
            </a>
          </li>
          
        
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>