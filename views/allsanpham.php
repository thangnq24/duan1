<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>




<main>
   
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Tất cả sản phẩm</h2>
                        
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                       <?php foreach ($listSanPham as $key => $sanpham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanpham['id'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanpham['hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($sanpham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                                    if ($tinhNgay->days <= 7) { ?>

                                                        <div class="product-label new">
                                                            <span>Mới</span>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php if ($sanpham['gia_khuyen_mai']) { ?>

                                                        <div class="product-label discount">
                                                            <span>SALE 10%</span>
                                                        </div>

                                                    <?php } ?>
                                                </div>

                                                <div class="cart-hover">
                                                    <button class="btn btn-cart"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanpham['id'] ?>">Xem chi tiết</a></button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">

                                                <h6 class="product-name">
                                                    <a href="product-details.html"><?= $sanpham['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($sanpham['gia_khuyen_mai']) { ?>

                                                        <span class="price-regular"><?= formatPrice($sanpham['gia_khuyen_mai']).'đ'; ?></span>
                                                    <span class="price-old"><del><?= formatPrice($sanpham['gia_san_pham']).'đ'; ?></del></span> 
                                                    <?php }else{?>
                                                        <span class="price-regular"><?= formatPrice($sanpham['gia_san_pham']).'đ'; ?></span>

                                                   <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                    <?php endforeach ?>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->

   
</main>



<!-- offcanvas mini cart start -->
<?php require_once 'layout/minicart.php'; ?>
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php'; ?>

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<!-- slick Slider JS -->
<script src="assets/js/plugins/slick.min.js"></script>
<!-- Countdown JS -->
<script src="assets/js/plugins/countdown.min.js"></script>
<!-- Nice Select JS -->
<script src="assets/js/plugins/nice-select.min.js"></script>
<!-- jquery UI JS -->
<script src="assets/js/plugins/jqueryui.min.js"></script>
<!-- Image zoom JS -->
<script src="assets/js/plugins/image-zoom.min.js"></script>
<!-- Images loaded JS -->
<script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<!-- mail-chimp active js -->
<script src="assets/js/plugins/ajaxchimp.js"></script>
<!-- contact form dynamic js -->
<script src="assets/js/plugins/ajax-mail.js"></script>
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
<!-- google map active js -->
<script src="assets/js/plugins/google-map.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:43 GMT -->

</html>