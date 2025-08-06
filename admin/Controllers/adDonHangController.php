<?php
class adDonHangController
{
  public $modelDonHang;

  public function __construct()
  {
    $this->modelDonHang = new adDonHang();
  }

  public function danhSachDonHang()
  {

    $listDonHang = $this->modelDonHang->getAllDonHang();

    require_once 'Views/DonHang/listDonHangView.php';
  }
  public function detailDonHang()
  {

    $don_hang_id = $_GET['id_don_hang'];

    // Lấy thông tin đơn hàng ở bảng don_hangs
    $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

    // Lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_hangs

    $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);

    $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

    require_once 'Views/DonHang/detailDonHangView.php';

  }

  //sửa đơn hàng
  public function formEditDonHang()
  {

    $id = $_GET['id_don_hang'];
    $donHang = $this->modelDonHang->getDetailDonHang($id);

    $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
    $errors = $_SESSION['error'] ?? [];
    if ($donHang) {
      require_once 'Views/DonHang/editDonHangView.php';
      deleteSessionError();
    } else {
      header("location:" . BASE_URL_ADMIN . '?act=donhang');
      exit();
    }

  }




  public function postEditDonHang()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $don_hang_id = $_POST['don_hang_id'] ?? '';


      $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
      $sdt = $_POST['sdt_nguoi_nhan'] ?? '';
      $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
      $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
      $ghi_chu = $_POST['ghi_chu'] ?? '';
      $trang_thai_id = $_POST['trang_thai_id'] ?? '';


      // tạo một mảng trống để chứa dữ liệu
      $errors = [];
      if (empty($ten_nguoi_nhan)) {
        $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
      }

      if (empty($sdt)) {
        $errors['sdt'] = 'SĐT người nhận không được để trống';
      }

      if (empty($email_nguoi_nhan)) {
        $errors['email_nguoi_nhan'] = 'Email người nhận không được để trống';
      }

      if (empty($dia_chi_nguoi_nhan)) {
        $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận không được để trống';
      }

      if (empty($trang_thai_id)) {
        $errors['trang_thai_id'] = 'Trạng thái đơn hàng';
      }

      $_SESSION['error'] = $errors;



      // nếu không lỗi thì tiến hành sửa
      if (empty($errors)) {

       $sql =  $this->modelDonHang->updateDonHang($don_hang_id, $ten_nguoi_nhan, $sdt, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id);
if ($sql) {
        header("location:" . BASE_URL_ADMIN . '?act=donhang');
    } else {
        $_SESSION['error'] = ['db' => 'Cập nhật thất bại. Vui lòng thử lại sau.'];
        $_SESSION['flash'] = true;
        header("location:" . BASE_URL_ADMIN . '?act=form-suadonhang&id_don_hang=' . $don_hang_id);
    }
    exit();
}

      

    }
  }

  // public function postEditAnhSanPham()
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     $san_pham_id = $_POST['san_pham_id'] ?? '';

  //     // lấy danh sách ảnh của sản phẩm
  //     $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
  //     // xử lý ảnh
  //     $img_array = $_FILES['img_array'];
  //     $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
  //     $current_img_ids = $_POST['current_img_ids'] ?? [];

  //     // khai báo mảng để lưu ảnh thêm mới hoặc thay thế
  //     $upload_file = [];

  //     foreach ($img_array['name'] as $key => $value) {
  //       if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
  //         $new_file = uploadFileAlbum($img_array, './uploads/', $key);
  //         if ($new_file) {
  //           $upload_file[] = [
  //             'id' => $current_img_ids[$key] ?? null,
  //             'file' => $new_file
  //           ];
  //         }
  //       }
  //     }

  //     // lưu ảnh mới và xoá ảnh cũ
  //     foreach ($upload_file as $file_info) {
  //       if ($file_info['id']) {
  //         $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
  //         // cập nhật ảnh cũ
  //         $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
  //         // xoá ảnh cũ
  //         deleteFile($old_file);

  //       } else {
  //         //  thêm ảnh mới
  //         $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
  //       }

  //     }
  //     // xử lý xoá ảnh
  //     foreach ($listAnhSanPhamCurrent as $anhSP) {
  //       $anh_id = $anhSP['id'];
  //       if (in_array($anh_id, $img_delete)) {
  //         // xoá ảnh
  //         $this->modelSanPham->destroyAnhSanPham($anh_id);

  //         // xoá file
  //         deleteFile($anhSP['link_hinh_anh']);
  //       }
  //     }
  //     header("location:" . BASE_URL_ADMIN . '?act=form-suasanpham&id_san_pham=' . $san_pham_id);
  //     exit();
  //   }


  // }


  // public function deleteSanPham()
  // {
  //   $id = $_GET['id_san_pham'];
  //   $sanpham = $this->modelSanPham->getDetailSanPham($id);
  //   $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

  //   if ($sanpham) {
  //     deleteFile($sanpham['hinh_anh']);
  //     $this->modelSanPham->destroySanPham($id);

  //   }

  //   if ($listAnhSanPham) {
  //     foreach ($listAnhSanPham as $key => $anhSP) {
  //       deleteFile($anhSP['link_hinh_anh']);
  //       $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
  //     }
  //   }
  //   header("location:" . BASE_URL_ADMIN . '?act=sanpham');
  //   exit();

  // }




}

?>