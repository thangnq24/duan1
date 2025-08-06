<?php 

session_start();

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
 
require_once 'Controllers/adDanhMucController.php';
require_once 'Controllers/adSanPhamController.php';
require_once 'Controllers/adDonHangController.php';
require_once 'Controllers/adTaiKhoanController.php';
require_once 'Controllers/AdBaoCaoThongKeController.php';


require_once 'Models/adSanPham.php';
require_once 'Models/adDanhMuc.php';
require_once 'Models/adDonHang.php';
require_once 'Models/adTaiKhoan.php';


// Route

 $act = $_GET['act'] ?? '/';
 if($act !=='login-admin'&& $act !=='check-login-admin' && $act !=='logout-admin'){
     checkLoginAdmin();
 
 }

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    //'/' => (new adDanhMucController())->danhSachDanhMuc(),
    '/' => (new AdBaoCaoThongKeController())->home(),
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
    'form-suasanpham' => (new adSanPhamController())->formEditSanPham(),
    'suasanpham' => (new adSanPhamController())->postEditSanPham(),
    'sua_albumanhsanpham' => (new adSanPhamController())->postEditAnhSanPham(),
    'xoasanpham' => (new adSanPhamController())->deleteSanPham(),
    'chitietsanpham' => (new adSanPhamController())->detailSanPham(),

     // route sản phẩm
    'donhang' => (new adDonHangController())->danhSachDonHang(),
    // 'form-suadonhang' => (new adDonHangController())->formEditDonHang(),
    // 'suadonhang' => (new adDonHangController())->postEditDonHang(),
    
    'chitietdonhang' => (new adDonHangController())->detailDonHang(),

     // route đơn hàng
    'donhang' => (new adDonHangController())->danhSachDonHang(),
    'form-suadonhang' => (new adDonHangController())->formEditDonHang(),
    'suadonhang' => (new adDonHangController())->postEditDonHang(),
    // 'xoasanpham' => (new adSanPhamController())->deleteSanPham(),
    'chitietdonhang' => (new adDonHangController())->detailDonHang(),

    // router tai khoan
    //quản lý tài khoản quản trị
    'list-tai-khoan-quan-tri' => (new adTaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri' => (new adTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri' => (new adTaiKhoanController())->postAddQuanTri(),
    'form-sua-quan-tri' => (new adTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri' => (new adTaiKhoanController())->postEditQuanTri(),

    //router reset password tài khoản
    'reset-password' => (new adTaiKhoanController())->resetPassword(),

    //quản lý tài khoản khách hàng
    'list-tai-khoan-khach-hang' => (new adTaiKhoanController())->danhSachKhachHang(),
    'form-sua-khach-hang' => (new adTaiKhoanController())->formEditKhachHang(),
    'sua-khach-hang' => (new adTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-khach-hang' => (new adTaiKhoanController())->detailKhachHang(),

    //router bình luân
    'update-trang-thai-binh-luan'=>(new adSanPhamController())->updateTrangThaiBinhLuan(),

    //router auth
    'login-admin'=>(new AdTaiKhoanController())->formLogin(),
    'check-login-admin'=>(new AdTaiKhoanController())->login(),
    'logout-admin'=>(new AdTaiKhoanController())->logout(),
};