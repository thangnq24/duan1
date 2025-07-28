<?php include './views/layout/header.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý Sản Phẩm</h1>
  </div>
  <div class="container mt-5">
    <h2 class="mb-4">Sửa sản phẩm</h2>
    <form action="<?= BASE_URL_ADMIN . '?act=suasanpham' ?>" method="POST">
      <input type="text" name="id" value="<?= $sanpham['id'] ?>" hidden>
      <div class="mb-3">
        <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham"
          value="<?= $sanpham['ten_san_pham'] ?>" placeholder="Nhập tên sản phẩm">
        <?php if (isset($errors['ten_san_pham'])) { ?>
          <p class="text-danger"><?= $errors['ten_san_pham'] ?></p>
        <?php } ?>
      </div>

      <div class="mb-3">
        <label for="mo_ta" class="form-label">Mô tả</label>
        <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4"
          placeholder="Nhập mô tả"> <?= $sanpham['mota'] ?></textarea>
      </div>
      <div class="mb-3">
        <label for="gia" class="form-label">Giá</label>
        <input type="number" class="form-control" id="gia" name="gia" value="<?= $sanpham['gia'] ?> rows=" 4"
          placeholder="Nhập giá"></input>
      </div>
      <div class="mb-3">
        <label for="so_luong" class="form-label">Số lượng</label>
        <input type="number" class="form-control" id="so_luong" name="so_luong"
          value="<?= $sanpham['so_luong'] ?> rows=" 4" placeholder="Nhập số lượng"></input>
      </div>
      <div class="mb-3">
        <label for="ngay_nhap" class="form-label">Ngày nhập</label>
        <input type="date" class="form-control" id="ngay_nhap" name="ngay_nhap"
          value="<?= $sanpham['ngay_nhap'] ?> rows=" 4" placeholder="Nhập số lượng"></input>
      </div>

      <button type="submit" class="btn btn-primary">Thêm mới</button>
      <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">Quay lại</a>
    </form>
  </div>
</main>

<?php include './views/layout/footer.php'; ?>