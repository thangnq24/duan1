<?php include './views/layout/header.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý Sản Phẩm</h1>
  </div>
  <div class="container mt-5">
    <h2 class="mb-4">Thêm sản phẩm</h2>
    <form action="<?= BASE_URL_ADMIN . '?act=themsanpham' ?>" method="POST">
      <div class="mb-3 col-12">
        <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
        <?php if (isset($errors['ten_san_pham'])) { ?>
          <p class="text-danger"><?= $errors['ten_san_pham'] ?></p>
        <?php } ?>
      </div>

      <div class="mb-3 col-12">
        <label for="hinh_anh" class="form-label">Hình ảnh sản phẩm</label>
        <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" placeholder="Hình ảnh sản phẩm">
        <?php if (isset($errors['hinh_anh'])) { ?>
          <p class="text-danger"><?= $errors['hinh_anh'] ?></p>
        <?php } ?>
      </div>
      <div class="mb-3 col-12">
        <label for="gia" class="form-label">Giá sản phẩm</label>
        <input type="number" class="form-control" id="gia" name="gia" placeholder="Nhập giá sản phẩm">
        <?php if (isset($errors['gia'])) { ?>
          <p class="text-danger"><?= $errors['gia'] ?></p>
        <?php } ?>
      </div>
      <div class="mb-3 col-12">
        <label for="gia_khuyen_mai" class="form-label">Giá khuyến mãi</label>
        <input type="number" class="form-control" id="gia_khuyen_mai" name="gia_khuyen_mai"
          placeholder="Nhập giá khuyến mãi">
        <?php if (isset($errors['gia_khuyen_mai'])) { ?>
          <p class="text-danger"><?= $errors['gia_khuyen_mai'] ?></p>
        <?php } ?>
      </div>
      <div class="mb-3 col-12">
        <label for="so_luong" class="form-label">Số lượng</label>
        <input type="number" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập số lượng">
        <?php if (isset($errors['so_luong'])) { ?>
          <p class="text-danger"><?= $errors['so_luong'] ?></p>
        <?php } ?>
      </div>
      <div class="mb-3 col-12">
        <label for="ngay_nhap" class="form-label">Ngày nhập sản phẩm</label>
        <input type="date" class="form-control" id="ngay_nhap" name="ngay_nhap" placeholder="Ngày nhập sản phẩm">
        <?php if (isset($errors['ngay_nhap'])) { ?>
          <p class="text-danger"><?= $errors['ngay_nhap'] ?></p>
        <?php } ?>
      </div>
      <div class="mb-3 col-12">
        <label for="danh_muc_id" class="form-label">Danh mục</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option selected disabled>Chọn danh mục sản phẩm</option>
          <?php foreach ($listDanhMuc as $danhMuc): ?>
            <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
          <?php endforeach ?>
        </select>
        <?php if (isset($errors['danh_muc_id'])) { ?>
          <p class="text-danger"><?= $errors['danh_muc_id'] ?></p>
        <?php } ?>
      </div>
      <div class="mb-3 col-12">
        <label for="trang_thai" class="form-label">Trạng thái</label>
        <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
          <option selected disabled>Chọn danh mục sản phẩm</option>
          <option value="1">Còn bán</option>
          <option value="2">Dừng bán</option>
        </select>
        <?php if (isset($errors['trang_thai'])) { ?>
          <p class="text-danger"><?= $errors['trang_thai'] ?></p>
        <?php } ?>
      </div>
      <div class="mb-3 col-12">
        <label for="mo_ta" class="form-label">Mô tả</label>
        <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4" placeholder="Mô tả"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Thêm mới</button>
      <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">Quay lại</a>
    </form>
  </div>
</main>

<?php include './views/layout/footer.php'; ?>