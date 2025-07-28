<?php include './views/layout/header.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý danh sách đơn hàng</h1>
  </div>

  <table class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Tên người nhận</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Trạng thái đơn hàng</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listDonHang as $key => $donHang): ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $donHang['ma_don_hang'] ?></td>
          <td><?= $donHang['ten_nguoi_nhan'] ?></td>
          <td><?= $donHang['sdt'] ?></td>
          <td><?= $donHang['ngay_dat'] ?></td>
          <td><?= $donHang['tong_tien'] ?></td>
          <td><?= $donHang['ten_trang_thai'] ?></td>
          <td><?= $donHang['ten_trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></td>
          <td>
            <a href="<?= BASE_URL_ADMIN . '?act=chitietdonhang&id_don_hang=' . $donHang['id'] ?>">
              <button class="btn btn-warning">Xem chi tiết</button>
            </a>
            <a href="<?= BASE_URL_ADMIN . '?act=formsuadonhang&id_don_hang=' . $donHang['id'] ?>">
              <button class="btn btn-danger">Sửa</button>
            </a>
          </td>
        </tr>

      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh sản phẩm</th>
        <th>Giá Tiền</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </tfoot>
  </table>
</main>

<?php include './views/layout/footer.php'; ?>