<?php
class adSanPhamController{
public $modelSanPham;
public $modelDanhMuc;

public function __construct()
{
    $this->modelSanPham = new adSanPham();
    $this->modelDanhMuc = new adDanhMuc();
}

    public function danhSachSanPham(){
          
        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once 'Views/SanPham/listSanPhamView.php';
    }

 public function formaddSanPham(){
        // hiển thị form nhập
         $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once 'Views/SanPham/addSanPhamView.php';
    }

     public function postaddSanPham(){
        // xử lý thêm dữ liệu

        // kiểm tra dữ liệu
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];
            
            $hinh_anh = $_FILES['hinh_anh'];
            // lưu hình ảnh
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            $img_array = $_FILES['img_array'];



            // tạo một mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_san_pham)){
                $errors['ten_san_pham'] = 'tên sản phẩm không được để trống';
            }

             if(empty($gia_san_pham)){
                $errors['gia_san_pham'] = 'giá sản phẩm không được để trống';
            }

             if(empty($gia_khuyen_mai)){
                $errors['gia_khuyen_mai'] = 'giá km sản phẩm không được để trống';
            }

             if(empty($so_luong)){
                $errors['so_luong'] = 'số lượng sản phẩm không được để trống';
            }

            if(empty($ngay_nhap)){
                $errors['ngay_nhap'] = 'ngày nhập sản phẩm không được để trống';
            }

            if(empty($danh_muc_id)){
                $errors['danh_muc_id'] = 'danh mục phẩm không được để trống';
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = 'trạng thái phẩm không được để trống';
            }

            // nếu không lỗi thì tiến hành thêm sản phẩm
            if(empty($errors)){
             
            $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai,$mo_ta,$file_thumb);
            header("location:" . BASE_URL_ADMIN . '?act=sanpham');
            exit();
            }else{
                        require_once 'Views/SanPham/addSanphamView.php';

            }

        }
    }

}
?>