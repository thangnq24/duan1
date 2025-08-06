 <!-- Start Header Area -->
 <header class="header-area header-wide">
     <!-- main header start -->


     <!-- header middle area start -->
     <div class="header-main-area sticky">
         <div class="container">
             <div class="row align-items-center position-relative">

                 <!-- start logo area -->
                 <div class="col-lg-2">
                     <div class="logo">
                         <a href="<?= BASE_URL ?>">
                             <img src="./uploads/logo3.png" alt="Brand Logo" style="width:50px; height:50px;">
                         </a>
                     </div>
                 </div>
                 <!-- start logo area -->

                 <!-- main menu area start -->
                 <div class="col-lg-4 position-static">
                     <div class="main-menu-area">
                         <div class="main-menu">
                             <!-- main menu navbar start -->
                             <nav class="desktop-menu">
                                 <ul>
                                     <li><a href="<?= BASE_URL ?>">Trang chủ</a>

                                     </li>

                                     <li><a href="<?= BASE_URL . '?act=san-pham' ?>">Sản phẩm<i class="fa fa-angle-down"></i></a></li>


                                     <li><a href="<?= BASE_URL ?>">Giới thiệu</a></li>
                                     <li><a href="<?= BASE_URL ?>">Liên hệ</a></li>
                             </nav>
                             <!-- main menu navbar end -->
                         </div>
                     </div>
                 </div>
                 <!-- main menu area end -->

                 <!-- mini cart area start -->
                 <div class="col-lg-6">
                     <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                         <div class="header-search-container">
                             <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                             <form class="header-search-box d-lg-none d-xl-block">
                                 <input type="text" placeholder="Tìm kiếm sản phẩm" class="header-search-field">
                                 <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                             </form>
                         </div>
                         <div class="header-configure-area">
                             <ul class="nav justify-content-end">

                                 <li class="user-hover">
                                     <?php if (isset($_SESSION['user_client'])): ?>
                                         <i class="pe-7s-user"></i> <?= htmlspecialchars($_SESSION['user_client']) ?>
                                     <?php else: ?>
                                         <i class="pe-7s-user"></i> Tài khoản
                                     <?php endif; ?>

                                     <ul class="dropdown-list">
                                         <?php if (isset($_SESSION['user_client'])): ?>
                                             <li><a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
                                         <?php else: ?>
                                             <li><a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></li>
                                             <li><a href="<?= BASE_URL . '?act=register' ?>">Đăng ký</a></li>
                                         <?php endif; ?>
                                     </ul>
                                 </li>


                                 <li>
                                     <a href="#" class="minicart-btn">
                                         <i class="pe-7s-shopbag"></i>
                                         <div class="notification">2</div>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- mini cart area end -->

             </div>
         </div>
     </div>
     <!-- header middle area end -->
     </div>
     <!-- main header start -->


 </header>
 <!-- end Header Area -->