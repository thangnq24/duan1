<?php


class AdminDonHangController
{

  public $modelDonHang;

  public function __construct()
  {
    $this->modelDonHang = new AdminDonHang();
  }
  public function danhSachDonHang(
  ) {

    $listDonHang = $this->modelDonHang->getAllDonHang();


    require_once './views/donhang/listDonHang.php';
  }

  public function detailDonHang()
  {

  }


  public function formEditDonHang()
  {
    // Hàm này dùng để hiển thị form nhập
    // Lấy ra thông tin của danh mục cần sửa
    $id = $_GET['id_don_hang'];
    $donhang = $this->modelDonHang->getDetailDonHang($id);
    if ($donhang) {
      require_once './views/donhang/editDonHang.php';
    } else {
      header("Location: " . BASE_URL_ADMIN . '?act=donhang');
      exit();
    }
  }
  // public function postEditDonHang()
  // {
  //   // Hàm này dùng để xử lý thêm dữ liệu

  //   // kiểm tra dữ liệu có phải được submit lên không
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     // Lấy ra dữ liệu\
  //     $id = $_POST['id'];
  //     $ten_danh_muc = $_POST['ten_danh_muc'];
  //     $mo_ta = $_POST['mo_ta'];

  //     // Tạo 1 mảng trống để chứa dữ liệu
  //     $errors = [];
  //     if (empty($ten_danh_muc)) {
  //       $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
  //     }

  //     // Nếu không có lỗi thì tiến hành sửa danh mục
  //     if (empty($errors)) {
  //       // Nếu không có lỗi thì tiến hành sửa danh mục

  //       $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
  //       header("Location: " . BASE_URL_ADMIN . '?act=danhmuc');
  //       exit();
  //     } else {
  //       // Trả về form và lỗi
  //       $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
  //       require_once './views/danhmuc/editDanhMuc.php';
  //     }
  //   }
  // }
  // public function deleteDonHang()
  // {
  //   $id = $_GET['id_danh_muc'];
  //   $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
  //   if ($danhMuc) {
  //     $this->modelDanhMuc->destroyDanhMuc($id);
  //   }
  //   header("Location: " . BASE_URL_ADMIN . '?act=danhmuc');
  //   exit();
  // }
}