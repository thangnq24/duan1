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
   // route danh mục
   'danhmuc' => (new adDanhMucController())->danhSachDanhMuc(),
   'form-themdanhmuc' => (new adDanhMucController())->formaddDanhMuc(),
   'themdanhmuc' => (new adDanhMucController())->postaddDanhMuc(),
   'form-suadanhmuc' => (new adDanhMucController())->formEditDanhMuc(),
   'suadanhmuc' => (new adDanhMucController())->postEditDanhMuc(),
   'xoadanhmuc' => (new adDanhMucController())->deleteDanhMuc(),

   // route sản phẩm
    'sanpham' => (new adSanPhamController())->danhSachSanPham(),
    'form-themsanpham' => (new adSanPhamController())->formaddSanPham(),
    'themsanpham' => (new adSanPhamController())->postaddSanPham(),
   // 'form-suadsanpham' => (new adSanPhamController())->formEditSanPham(),
   // 'suasanpham' => (new adSanPhamController())->postEditSanPham(),
   // 'xoasanpham' => (new adSanPhamController())->deleteSanPham(),
};