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
          <h1>Quản Lý Danh Mục</h1>
        </div>

         </div>
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Danh Mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=themdanhmuc' ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tên Danh Mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc"  placeholder="Nhập Tên Danh Mục">
                    <?php if(isset( $_SESSION['error'] ['ten_danh_muc'])){ ?>
                        <p class="text-danger"><?= $_SESSION['error'] ['ten_danh_muc'] ?></p>
                   <?php } ?>
                  </div>
                 
                  <div class="form-group">
                    <label >Mô Tả</label>
                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập Mô Tả"></textarea>
                  </div>
                 
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
     
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

        
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



</body>

</html>