<?php


class AdminSanPhamController
{
  public $modelSanPham;
  public $modelDanhMuc;

  public function __construct()
  {
    $this->modelSanPham = new AdminSanPham();
    $this->modelDanhMuc = new AdminDanhMuc();
  }
  public function danhSachSanPham(
  ) {

    $listSanPham = $this->modelSanPham->getAllSanPham();


    require_once './views/sanpham/listSanPham.php';
  }
  public function formAddSanPham()
  {
    $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
    // Hàm này dùng để hiển thị form nhập
    require_once './views/sanpham/addSanPham.php';
  }
  public function postAddSanPham()
  {
    // Hàm này dùng để xử lý thêm dữ liệu

    // kiểm tra dữ liệu có phải được submit lên không
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Lấy ra dữ liệu
      $ten_san_pham = $_POST['ten_san_pham'];
      $mo_ta = $_POST['mo_ta'];
      $gia = $_POST['gia'];
      $so_luong = $_POST['so_luong'];
      $ngay_nhap = $_POST['ngay_nhap'];

      // Tạo 1 mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ten_san_pham)) {
        $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';

      }

      // Nếu không có lỗi thì tiến hành thêm danh mục
      if (empty($errors)) {
        // Nếu không có lỗi thì tiến hành thêm danh mục

        $this->modelSanPham->insertSanPham($ten_san_pham, $mo_ta, $gia, $so_luong, $ngay_nhap);
        header("Location: " . BASE_URL_ADMIN . '?act=sanpham');
        exit();
      } else {
        // Trả về form và lỗi
        require_once './views/sanpham/addSanPham.php';
      }
    }
  }
  public function formEditSanPham()
  {
    // Hàm này dùng để hiển thị form nhập
    // Lấy ra thông tin của danh mục cần sửa
    $id = $_GET['id_san_pham'];
    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    if ($sanPham) {
      require_once './views/sanpham/editSanPham.php';
    } else {
      header("Location: " . BASE_URL_ADMIN . '?act=sanpham');
      exit();
    }
  }
  public function postEditSanPham()
  {
    // Hàm này dùng để xử lý thêm dữ liệu

    // kiểm tra dữ liệu có phải được submit lên không
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Lấy ra dữ liệu\
      $id = $_POST['id'];
      $ten_san_pham = $_POST['ten_san_pham'];
      $mo_ta = $_POST['mo_ta'];
      $gia = $_POST['gia'];
      $so_luong = $_POST['so_luong'];
      $ngay_nhap = $_POST['ngay_nhap'];

      // Tạo 1 mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ten_san_pham)) {
        $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
      }

      // Nếu không có lỗi thì tiến hành sửa danh mục
      if (empty($errors)) {
        // Nếu không có lỗi thì tiến hành sửa danh mục

        $this->modelSanPham->updateSanPham($id, $ten_san_pham, $mo_ta, $gia, $so_luong, $ngay_nhap);
        header("Location: " . BASE_URL_ADMIN . '?act=sanpham');
        exit();
      } else {
        // Trả về form và lỗi
        $danhMuc = ['id' => $id, 'ten_san_pham' => $ten_san_pham, 'mo_ta' => $mo_ta, 'gia' => $gia, 'so_luong' => $so_luong, 'ngay_nhap' => $ngay_nhap];
        require_once './views/sanpham/editSanPham.php';
      }
    }
  }
  public function deleteSanPham()
  {
    $id = $_GET['id_san_pham'];
    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    if ($sanPham) {
      $this->modelSanPham->destroySanPham($id);
    }
    header("Location: " . BASE_URL_ADMIN . '?act=sanpham');
    exit();
  }
}