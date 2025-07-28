<?php


class AdminDonHangController
{

  public $modelDanhMuc;

  public function __construct()
  {
    $this->modelDanhMuc = new AdminDanhMuc();
  }
  public function danhSachDonHang(
  ) {

    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();


    require_once './views/danhmuc/listDanhMuc.php';
  }


  public function formEditDonHang()
  {
    // Hàm này dùng để hiển thị form nhập
    // Lấy ra thông tin của danh mục cần sửa
    $id = $_GET['id_danh_muc'];
    $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    if ($danhMuc) {
      require_once './views/danhmuc/editDanhMuc.php';
    } else {
      header("Location: " . BASE_URL_ADMIN . '?act=danhmuc');
      exit();
    }
  }
  public function postEditDonHang()
  {
    // Hàm này dùng để xử lý thêm dữ liệu

    // kiểm tra dữ liệu có phải được submit lên không
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Lấy ra dữ liệu\
      $id = $_POST['id'];
      $ten_danh_muc = $_POST['ten_danh_muc'];
      $mo_ta = $_POST['mo_ta'];

      // Tạo 1 mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ten_danh_muc)) {
        $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
      }

      // Nếu không có lỗi thì tiến hành sửa danh mục
      if (empty($errors)) {
        // Nếu không có lỗi thì tiến hành sửa danh mục

        $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
        header("Location: " . BASE_URL_ADMIN . '?act=danhmuc');
        exit();
      } else {
        // Trả về form và lỗi
        $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
        require_once './views/danhmuc/editDanhMuc.php';
      }
    }
  }
  public function deleteDonHang()
  {
    $id = $_GET['id_danh_muc'];
    $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    if ($danhMuc) {
      $this->modelDanhMuc->destroyDanhMuc($id);
    }
    header("Location: " . BASE_URL_ADMIN . '?act=danhmuc');
    exit();
  }
}