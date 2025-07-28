<?php
// Require file Common
require_once '../commons/env.php';
require_once '../commons/function.php';

// Require file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';


// Require file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';



// Route
$act = $_GET['act'] ?? '/';

match ($act) {
  // route danh mục
  'danhmuc' => (new ADminDanhMucController())->danhSachDanhMuc(),
  'formthemdanhmuc' => (new ADminDanhMucController())->formAddDanhMuc(),
  'themdanhmuc' => (new ADminDanhMucController())->postAddDanhMuc(),
  'formsuadanhmuc' => (new ADminDanhMucController())->formEditDanhMuc(),
  'suadanhmuc' => (new ADminDanhMucController())->postEditDanhMuc(),
  'xoadanhmuc' => (new ADminDanhMucController())->deleteDanhMuc(),

  // route sản phẩm
  'sanpham' => (new ADminSanPhamController())->danhSachSanPham(),
  'formthemsanpham' => (new ADminSanPhamController())->formAddSanPham(),
  'themsanpham' => (new ADminSanPhamController())->postAddSanPham(),
  'formsuasanpham' => (new ADminSanPhamController())->formEditSanPham(),
  'suasanpham' => (new ADminSanPhamController())->postEditSanPham(),
  'xoasanpham' => (new ADminSanPhamController())->deleteSanPham(),


  // route đơn hàng
  'donhang' => (new ADminDonHangController())->danhSachDonHang(),
  'formsuadonhang' => (new ADminDonHangController())->formEditDonHang(),
  'suadonhang' => (new ADminDonHangController())->postEditDonHang(),
  'xoadonhang' => (new ADminDonHangController())->deleteDonHang(),
  'chitietdonhang' => (new ADminDonHangController())->detailDonHang(),



}
  ?>