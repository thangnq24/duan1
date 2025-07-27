<?php
class adDanhMucController{
public $modelDanhMuc;

public function __construct()
{
    $this->modelDanhMuc = new adDanhMuc();
}

    public function danhSachDanhMuc(){

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once 'Views/DanhMuc/listDanhMucView.php';
    }

    public function formaddDanhMuc(){
        // hiển thị form nhập
        require_once 'Views/DanhMuc/addDanhMucView.php';
        deleteSessionError();
    }

     public function postaddDanhMuc(){
        // xử lý thêm dữ liệu

        // kiểm tra dữ liệu
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // tạo một mảng trống để chứa dữ liệu
            $errors = [];

            

            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'tên danh mục không được để trống';
            }
            
            $_SESSION['error'] = $errors;
            // nếu không lỗi thì tiến hành thêm danh mục
            if(empty($errors)){
             
            $this->modelDanhMuc->insertDanhMuc($ten_danh_muc,$mo_ta);
            header("location:" . BASE_URL_ADMIN . '?act=danhmuc');
            exit();
            }else{
                    $_SESSION['flash'] = true;
                       header("location:" . BASE_URL_ADMIN . '?act=form-themdanhmuc');
            }

        }
    }

    // sửa

     public function formEditDanhMuc(){
        // hiển thị form nhập
         $id = $_GET['id_danh_muc'];
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhmuc){
             require_once 'Views/DanhMuc/editDanhMucView.php';
        }
        else{
             header("location:" . BASE_URL_ADMIN . '?act=danhmuc');
            exit();
        }
       
    }

     public function postEditDanhMuc(){
        // xử lý thêm dữ liệu

        // kiểm tra dữ liệu
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy dữ liệu
            $id = $_POST['id'];

            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // tạo một mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'tên danh mục không được để trống';
            }

            // nếu không lỗi thì tiến hành sửa danh mục
            if(empty($errors)){
             
            $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta);
           
            header("location:" . BASE_URL_ADMIN . '?act=danhmuc');
            exit();
            }else{
                $danhmuc = ['id'=>$id, 'ten_danh_muc'=>$ten_danh_muc, 'mo_ta'=>$mo_ta];
                        require_once 'Views/DanhMuc/editDanhMucView.php';

            }

        }
    }

    public function deleteDanhMuc(){
         $id = $_GET['id_danh_muc'];
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if($danhmuc){
         $this->modelDanhMuc->destroyDanhMuc($id);
    
              header("location:" . BASE_URL_ADMIN . '?act=danhmuc');
            exit();
        }
    }

}
?>