<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh mục </h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=form-themdanhmuc' ?>">
                <button class="btn btn-success">Thêm Danh Mục</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên Danh Mục</th>
                    <th>Mô Tả</th>
                    <th>Thao Tác</th>
                  </tr>
                </thead>
                <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                  <tbody>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $danhMuc['ten_danh_muc']  ?></td>
                      <td><?= $danhMuc['mo_ta']  ?></td>

                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-suadanhmuc&id_danh_muc=' . $danhMuc['id'] ?>">
                      <button class="btn btn-sm btn-primary mb-1">Sửa</button>

                        </a>

                         <a href="<?= BASE_URL_ADMIN . '?act=xoadanhmuc&id_danh_muc=' . $danhMuc['id'] ?>" 
                         onclick="return confirm('Bạn có đồng ý xoá hay không?')">
                      <button class="btn btn-sm btn-danger">Xoá</button>

                        </a>

                      </td>

                    </tr>
                  <?php endforeach ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>STT</th>
                      <th>Tên Danh Mục</th>
                      <th>Mô Tả</th>
                      <th>Thao Tác</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->

</body>

</html>