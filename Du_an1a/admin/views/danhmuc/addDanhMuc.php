<?php include './views/layout/header.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý danh mục</h1>
  </div>
  <div class="container mt-5">
    <h2 class="mb-4">Thêm danh mục</h2>
    <form action="<?= BASE_URL_ADMIN . '?act=themdanhmuc' ?>" method="POST">
      <div class="mb-3">
        <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" placeholder="Nhập tên danh mục">
        <?php if (isset($errors['ten_danh_muc'])) { ?>
          <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
        <?php } ?>
      </div>

      <div class="mb-3">
        <label for="mo_ta" class="form-label">Mô tả</label>
        <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4" placeholder="Mô tả"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Thêm mới</button>
      <a href="<?= BASE_URL_ADMIN . '?act=danhmuc' ?>" class="btn btn-secondary">Quay lại</a>
    </form>
  </div>
</main>

<?php include './views/layout/footer.php'; ?>