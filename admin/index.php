<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

require_once 'Controllers/adDanhMucController.php';
require_once 'Controllers/adSanPhamController.php';

require_once 'Models/adSanPham.php';
require_once 'Models/adDanhMuc.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
   'danhmuc' => (new adDanhMucController())->danhSachDanhMuc(),
};