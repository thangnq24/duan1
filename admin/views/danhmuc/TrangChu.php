<?php include './views/layout/header.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Main content -->
<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tổng quan</h1>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="card text-white bg-primary mb-3">
        <div class="card-body">
          <h5 class="card-title">Sản phẩm</h5>
          <p class="card-text">120 sản phẩm</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Đơn hàng</h5>
          <p class="card-text">45 đơn hàng mới</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-warning mb-3">
        <div class="card-body">
          <h5 class="card-title">Khách hàng</h5>
          <p class="card-text">78 tài khoản</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-danger mb-3">
        <div class="card-body">
          <h5 class="card-title">Bình luận</h5>
          <p class="card-text">30 phản hồi</p>
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-header">Hoạt động gần đây</div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Người dùng Le Thi B đặt hàng lúc 09:45</li>
      <li class="list-group-item">Góp ý mới từ Nguyễn Văn A</li>
      <li class="list-group-item">Thêm sản phẩm mới: Gấu Pooh</li>
    </ul>
  </div>
</main>

<?php include './views/layout/footer.php'; ?>