<?php include './views/layout/header.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Quản lý danh mục</h1>
    <a href="<?= BASE_URL_ADMIN . '?act=formthemdanhmuc' ?>" class="btn btn-primary">+ Thêm danh mục</a>
  </div>

  <table class="table table-bordered table-hover bg-white">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $danhMuc['ten_danh_muc'] ?></td>
          <td><?= $danhMuc['mo_ta'] ?></td>
          <td>
            <a href="<?= BASE_URL_ADMIN . '?act=formsuadanhmuc&id_danh_muc=' . $danhMuc['id'] ?>">
              <button class="btn btn-warning">Sửa</button>
            </a>
            <a href="<?= BASE_URL_ADMIN . '?act=xoadanhmuc&id_danh_muc=' . $danhMuc['id'] ?>"
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