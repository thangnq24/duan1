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
          <h1>Quản lý sản phẩm </h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
            
              <div class="col-12">
                <img src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <?php foreach($listAnhSanPham as $key=>$anhSP): ?>
                <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active':''?>" ><img src="<?= BASE_URL . $anhSP['link_hinh_anh']; ?>" alt="Product Image"></div>
                <?php endforeach?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Tên Sản Phẩm: <?= $sanpham['ten_san_pham'] ?></h3>

              <hr>
              <h4>Available Colors</h4>
              
              <h4 class="mt-3">Giá tiền: <small><?= $sanpham['gia_san_pham'] ?></small></h4>
              <h4 class="mt-3">Giá khuyến mãi: <small><?= $sanpham['gia_khuyen_mai'] ?></small></h4>
              <h4 class="mt-3">Số lượng: <small><?= $sanpham['so_luong'] ?></small></h4>
              <h4 class="mt-3">Lượt xem: <small><?= $sanpham['luot_xem'] ?></small></h4>
              <h4 class="mt-3">Ngày nhập: <small><?= $sanpham['ngay_nhap'] ?></small></h4>
              <h4 class="mt-3">Danh mục: <small><?= $sanpham['ten_danh_muc'] ?></small></h4>
              <h4 class="mt-3">Trạng thái: <small><?= $sanpham['trang_thai'] == 1 ? 'còn bán' : 'dừng bán' ?></small></h4>
              <h4 class="mt-3">mô tả: <small><?= $sanpham['mo_ta'] ?></small></h4>

             

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận sản phẩm</a>
               
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="binh-luan" role="tabpanel" aria-labelledby="product-desc-tab"> </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr></tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>

<!-- Page specific script -->
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
<!-- Code injected by live-server -->

</body>

</html>