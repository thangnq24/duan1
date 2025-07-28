<style>
  .sidebar-link {
    transition: background-color 0.2s;
  }

  .sidebar-link:hover {
    background-color: #495057;
    /* Màu xám sáng hơn bg-dark */
    color: #fff;
  }
</style>

<!-- Sidebar -->
<nav class="col-md-2 d-none d-md-block bg-dark text-white vh-100 position-fixed">
  <div class="p-3">
    <h4 class="text-center mb-4">Admin</h4>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white sidebar-link" href="<?= BASE_URL ?>">Trang chủ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white sidebar-link" href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>">Sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white sidebar-link" href="<?= BASE_URL_ADMIN . '?act=danhmuc' ?>">Danh mục</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white sidebar-link" href="<?= BASE_URL_ADMIN . '?act=donhang' ?>">Đơn hàng</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white sidebar-link" href="#">Tài khoản</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white sidebar-link" href="#">Phản hồi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white sidebar-link" href="#">Bình luận</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white sidebar-link" href="#">Thoát</a>
      </li>
    </ul>
  </div>
</nav>