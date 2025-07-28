<?php
// Require file Common
require_once './commons/env.php';
require_once './commons/function.php';

// Require file Controllers
require_once './controllers/HomeController.php';

// Require file Models
require_once './models/User.php';
require_once './models/SanPham.php';


// Route
$act = $_GET['act'] ?? '/';

match ($act) {
  '/' => (new HomeController())->home(),
  'trangChu' => (new Homecontroller())->trangChu(),
  'danhsachsanpham' => (new Homecontroller())->danhSachSanPham()

}
  ?>