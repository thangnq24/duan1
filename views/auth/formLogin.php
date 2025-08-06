<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>

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
                                    <li class="breadcrumb-item active" aria-current="page">login-Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container" style="max-width:40vw">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-12">
                            <div class="login-reg-form-wrap">
                                <h5 class="text-center">Đăng nhập</h5>
                                <?php if(isset($_SESSION['error'])){?>
                                     <p class="text-danger login-box-msg"><?php print_r($_SESSION['error'])   ?></p>
                                      
                                     <?php unset($_SESSION['error']);  }else{   ?>
                                        <p class="login-box-msg">Vui lòng đăng nhập</p>
                                    <?php } ?>
                                <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                                    <div class="single-input-item">
                                        <input type="email" name="email" placeholder="Email or Username" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" name="password" placeholder="Enter your Password" required />
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            
                                            <a href="#" class="forget-pwd">Quên mật khẩu</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn btn-sqr">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->

                        <!-- Register Content Start -->
                        
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>






<!-- offcanvas mini cart start -->

<!-- offcanvas mini cart end -->

<?php require_once 'views/layout/footer.php'; ?>

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