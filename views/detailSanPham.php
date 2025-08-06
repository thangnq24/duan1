<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>




<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">Sản phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham) { ?>
                                        <div class="pro-large-img img-zoom">
                                            <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham) { ?>
                                        <div class="pro-nav-thumb">
                                            <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php } ?>


                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="#"><?= $sanpham['ten_danh_muc'] ?> </a>
                                    </div>
                                    <h3 class="product-name"><?=$sanpham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex">

                                        <div class="pro-review">
                                            <?php $countComment = count($listBinhLuan); ?>
                                            <span><?= $countComment, 'bình luận' ?></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php if ($sanpham['gia_khuyen_mai']) { ?>

                                            <span class="price-regular"><?= formatPrice($sanpham['gia_khuyen_mai']) . 'đ'; ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanpham['gia_san_pham']) . 'đ'; ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanpham['gia_san_pham']) . 'đ'; ?></span>

                                        <?php } ?>
                                    </div>

                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $sanpham['so_luong'] . ' ' . 'trong kho' ?></span>
                                    </div>
                                    <p class="pro-desc"><?= $sanpham['mo_ta'] ?></p>

                                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">Số lượng</h6>
                                        <div class="quantity">
                                            <input type="hidden" name="san_pham_id" value="<?= $sanpham['id']; ?>">
                                            <div class="pro-qty"><input type="text" value="1" name="so_luong"  ></div>
                                        </div>
                                        <div class="action_link">
                                            <button class="btn btn-cart2" >Thêm giỏ hàng</button>
                                        </div>
                                    </div>
                                     </form>   

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">

                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận (<?= $countComment ?>)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">

                                        <div class="tab-pane fade show active" id="tab_three">
                                            <?php foreach ($listBinhLuan as $binhluan): ?>

                                                <div class="total-reviews">
                                                    <div class="rev-avatar">
                                                        <img src="<?= $binhluan['anh_dai_dien'] ?>" alt="">

                                                    </div>
                                                    <div class="review-box">

                                                        <div class="post-author">
                                                            <p><span>Khách hàng -</span> <?= $binhluan['ngay_dang'] ?></p>
                                                        </div>
                                                        <p><?= $binhluan['noi_dung'] ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            <form action="#" class="review-form">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Nội dung bình luận</label>
                                                        <textarea class="form-control" required></textarea>

                                                    </div>
                                                </div>

                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Bình luận</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm liên quan</h2>

                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <?php foreach ($listSanPhamCungDanhMuc as $key => $sanpham): ?>
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

                                            <span class="price-regular"><?= formatPrice($sanpham['gia_khuyen_mai']) . 'đ'; ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanpham['gia_san_pham']) . 'đ'; ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanpham['gia_san_pham']) . 'đ'; ?></span>

                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        <?php endforeach ?>
                    </div>
                    <!-- product item end -->

                    <!-- product item start -->
                    
                    <!-- product item end -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- related products area end -->
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