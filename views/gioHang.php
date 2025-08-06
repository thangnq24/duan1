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
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                        <th class="pro-title">Tên sản phẩm</th>
                                        <th class="pro-price">Giá tiền</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                        <th class="pro-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tongTienGioHang = 0;
                                    foreach ($chiTietGioHang as $key => $sanPham):
                                    ?>

                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#"><?= $sanPham['ten_san_pham'] ?></a></td>
                                            <td class="pro-price"><span>
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <?= formatPrice($sanPham['gia_khuyen_mai']) . '.đ' ?>
                                                    <?php } else { ?>
                                                        <?= formatPrice($sanPham['gia_san_pham']) . '.đ' ?>
                                                    <?php } ?>
                                                </span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <input type="number" class="qty-input"
                                                        value="<?= $sanPham['so_luong'] ?>"
                                                        data-price="<?= $sanPham['gia_khuyen_mai'] ?: $sanPham['gia_san_pham'] ?>">
                                                </div>
                                            </td>
                                            <td class="pro-subtotal">
                                                <span class="item-subtotal"><?= formatPrice($tongtien) . '.đ' ?></span>
                                            </td>
                                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="btn btn-sqr">Apply Coupon</button>
                                </form>
                            </div>
                            <div class="cart-update">
                                <a href="#" class="btn btn-sqr">Update Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Tổng đơn hàng</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Tổng tiền sản phẩm</td>
                                            <td><?= formatPrice($tongTienGioHang) . '.đ' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Vận chuyển</td>
                                            <td>30.000.đ</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng tiền thanh toán</td>
                                            <td class="total-amount"><?= formatPrice($tongTienGioHang + 30000) . '.đ' ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="checkout.html" class="btn btn-sqr d-block">Tiến hành đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
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

<script>
$(document).ready(function () {
    function formatCurrency(num) {
        return new Intl.NumberFormat('vi-VN').format(num) + '.đ';
    }

    function updateCartTotal() {
        let total = 0;
        $('.qty-input').each(function () {
            let qty = parseInt($(this).val());
            let price = parseFloat($(this).data('price'));
            let subtotal = qty * price;
            total += subtotal;

            // Update subtotal for each item
            $(this).closest('tr').find('.item-subtotal').text(formatCurrency(subtotal));
        });

        // Update total product price
        $('.cart-calculate-items td').eq(1).text(formatCurrency(total));

        // Update total payment (with shipping fee)
        const shipping = 30000;
        $('.total-amount').text(formatCurrency(total + shipping));
    }

    // Trigger update when quantity changes
    $(document).on('input', '.qty-input', function () {
        updateCartTotal();
    });

    // Optional: restrict to min 1
    $(document).on('blur', '.qty-input', function () {
        if (parseInt($(this).val()) < 1) {
            $(this).val(1);
            updateCartTotal();
        }
    });

    // Initial run
    updateCartTotal();
});
</script>

</body>


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:43 GMT -->

</html>