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
          <h1>Quản Lý Sản Phẩm</h1>
        </div>

         </div>
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Sản Phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN . '?act=themsanpham' ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-12">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham"  placeholder="Nhập Tên Sản Phẩm">
                    <?php if(isset( $_SESSION['error'] ['ten_san_pham'])){ ?>
                        <p class="text-danger"><?=$_SESSION['error'] ['ten_san_pham'] ?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label >Giá Sản Phẩm</label>
                    <input type="number" class="form-control" name="gia_san_pham"  placeholder="Nhập Giá Sản Phẩm">
                    <?php if(isset( $_SESSION['error'] ['gia_san_pham'])){ ?>
                        <p class="text-danger"><?=$_SESSION['error'] ['gia_san_pham'] ?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label >Giá Khuyến Mãi</label>
                    <input type="number" class="form-control" name="gia_khuyen_mai"  placeholder="Nhập Giá Khuyến Mãi">
                    <?php if(isset( $_SESSION['error'] ['gia_khuyen_mai'])){ ?>
                        <p class="text-danger"><?=$_SESSION['error'] ['gia_khuyen_mai'] ?></p>
                   <?php } ?>
                  </div>

                   <div class="form-group col-6">
                    <label >Hình ảnh</label>
                    <input type="file" class="form-control" name="hinh_anh"  >
                    <?php if(isset( $_SESSION['error'] ['hinh_anh'])){ ?>
                        <p class="text-danger"><?=$_SESSION['error'] ['hinh_anh'] ?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label >Abum ảnh</label>
                    <input type="file" class="form-control" name="img_array[]" multiple accept="image/*">                    
                  </div>

                  <div class="form-group col-6">
                    <label >Số Lượng</label>
                    <input type="number" class="form-control" name="so_luong"  placeholder="Nhập số lượng">
                    <?php if(isset( $_SESSION['error'] ['so_luong'])){ ?>
                        <p class="text-danger"><?=$_SESSION['error'] ['so_luong'] ?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group col-6">
                    <label >Ngày Nhập</label>
                    <input type="date" class="form-control" name="ngay_nhap"  placeholder="Nhập ngày nhập">
                    <?php if(isset( $_SESSION['error'] ['ngay_nhap'])){ ?>
                        <p class="text-danger"><?=$_SESSION['error'] ['ngay_nhap'] ?></p>
                   <?php } ?>
                  </div>

                  <div class="form-group col-6">

                    <label >Danh Mục</label>
                    <select class="form-control" name="danh_muc_id" id="danh_muc_id">
                      <option selected disabled>Chọn Danh Mục</option>
                      <?php foreach($listDanhMuc as $danhMuc): ?>
                       <option value="<?= $danhMuc['id']?>"><?= $danhMuc['ten_danh_muc']?></option>
                        
                        <?php endforeach?>
                        
                    </select>
                     <?php if(isset( $_SESSION['error'] ['danh_muc_id'])){ ?>
                        <p class="text-danger"><?=$_SESSION['error'] ['danh_muc_id'] ?></p>
                   <?php } ?>
                      </div>

                       <div class="form-group col-6">
                      <label >Trạng Thái</label>
                    <select class="form-control" name="trang_thai" id="">
                      <option selected disabled>Chọn Trạng Thái</option>
                       <option value="1">Còn bán</option>
                       <option value="2">Dừng bán</option>
                        
                    </select>
                    <?php if(isset( $_SESSION['error'] ['trang_thai'])){ ?>
                        <p class="text-danger"><?=$_SESSION['error'] ['trang_thai'] ?></p>
                   <?php } ?>
                      </div>
                 
                  <div class="form-group col-12">
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