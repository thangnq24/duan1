<?php include './views/layout/header.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý sản phẩm</h1>
    <a href="<?= BASE_URL_ADMIN . '?act=formthemsanpham' ?>" class="btn btn-primary">+ Thêm sản phẩm</a>
  </div>

  <table class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Mô tả</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Ngày nhập</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listSanPham as $key => $sanPham): ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $sanPham['ten_san_pham'] ?></td>
          <td><?= $sanPham['mo_ta'] ?></td>
          <td><?= $sanPham['gia'] ?></td>
          <td><?= $sanPham['so_luong'] ?></td>
          <td><?= $sanPham['ngay_nhap'] ?></td>
          <td>
            <a href="<?= BASE_URL_ADMIN . '?act=formsuasanpham&id_san_pham=' . $sanPham['id'] ?>">
              <button class="btn btn-warning">Sửa</button>
            </a>
            <a href="<?= BASE_URL_ADMIN . '?act=xoasanpham&id_san_pham=' . $sanPham['id'] ?>"
              onclick="return confirm('Bạn có đồng ý xóa hay không?')">
              <button class="btn btn-danger">Xóa</button>
            </a>
          </td>
        </tr>

      <?php endforeach ?>
    </tbody>
  </table>
</main>

<?php include './views/layout/footer.php'; ?>