<?php
    require_once './Models/adDonHang.php';
class AdTaiKhoanController
{

    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;
    public function __construct()
    {
        $this-> modelTaiKhoan=new AdTaiKhoan();
        $this-> modelDonHang=new AdDonHang();
        $this-> modelSanPham=new adSanPham();
    }
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        // var_dump($listQuanTri);die;
        require_once './Views/taiKhoan/quanTri/listQuanTri.php';
    }
    public function formAddQuanTri()
    {
        require_once './Views/taiKhoan/quanTri/addQuanTri.php';
        deleteSessionError();
    }

     public function postAddQuanTri(){
        // xử lý thêm dữ liệu
       
        // kiểm tra dữ liệu
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy dữ liệu
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            // tạo một mảng trống để chứa dữ liệu
            $errors = [];

            

            if(empty($ho_ten)){
                $errors['ho_ten'] = 'tên không được để trống';
            }

            if(empty($email)){
                $errors['email'] = 'email không được để trống';
            }
            
            $_SESSION['error'] = $errors;
           
            // nếu không lỗi thì tiến hành thêm danh mục
            if(empty($errors)){
                $password = password_hash('123@123ab',PASSWORD_BCRYPT);
                //var_dump($password);die;
                $chuc_vu_id = 1;
                $this ->modelTaiKhoan->insertTaiKhoan($ho_ten,$email,$password,$chuc_vu_id);
                 //var_dump($ho_ten);die;
                header("location:". BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            }else{
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-quan-tri');
            }
            

        }
    }
    public function formEditQuanTri()
    {
        $id_quan_tri= $_GET['id_quan-tri'];
        $quanTri=$this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        // var_dump($quanTri);die;
        require_once ('./Views/taiKhoan/quanTri/editQuanTri.php');
        
        deleteSessionError();
    }
    public function postEditQuanTri(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy dữ liệu  
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            // truy vấn

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            
           



            // tạo một mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ho_ten)){
                $errors['ho_ten'] = 'tên không được để trống';
            }if(empty($email)){
                $errors['email'] = 'email không được để trống';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'trạng thái phẩm không được để trống';
            }

           

            $_SESSION['error'] = $errors;
            


            if(empty($errors)){
             
         $this->modelTaiKhoan->updateTaiKhoan( $quan_tri_id, $ho_ten, $email,$so_dien_thoai,$trang_thai);
           


            header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
            }else{
                       // đặt hiển thị xoá session sau khi hiển thị form
                       $_SESSION['flash'] = true;
                       header("location:" . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan-tri=' . $quan_tri_id);
            exit();

            }

        }
    }
    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        $password = password_hash('123@123ab',PASSWORD_BCRYPT);
        $status= $this->modelTaiKhoan->resetPassword($tai_khoan_id,$password);
        // var_dump($status);die;
        if($status && $tai_khoan ['chuc_vu_id']==1){
            header("location:".BASE_URL_ADMIN.'?act=list-tai-khoan-quan-tri');
            exit();
        }elseif($status && $tai_khoan['chuc_vu_id']==2){
            header("location:".BASE_URL_ADMIN.'?act=list-tai-khoan-quan-tri');
            exit();
        }else{
            var_dump('lỗi reset tài khoản');die;
        }
    }
        public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        // var_dump($listQuanTri);die;
        require_once './Views/taiKhoan/khachHang/listKhachHang.php';
    }


        public function formEditKhachHang()
    {
        $id_khach_hang= $_GET['id_khach_hang'];
        $khach_hang=$this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($quanTri);die;
        require_once ('./Views/taiKhoan/khachHang/editKhachHang.php');
        
        deleteSessionError();
    }
        public function postEditKhachHang(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy dữ liệu  
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';
            // truy vấn

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            
           



            // tạo một mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ho_ten)){$errors['ho_ten'] = 'tên không được để trống';
            }
            if(empty($email)){
                $errors['email'] = 'email không được để trống';
            }
            if(empty($ngay_sinh)){
                $errors['ngay_sinh'] = 'ngay sinh không được để trống';
            }
            if(empty($gioi_tinh)){
                $errors['gioi_tinh'] = 'gioi tinh không được để trống';
            }
            if(empty($dia_chi)){
                $errors['dia_chi'] = 'dia_chi không được để trống';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'trạng thái phẩm không được để trống';
            }

           

            $_SESSION['error'] = $errors;
            


            if(empty($errors)){
                $this->modelTaiKhoan->updateKhachHang( $khach_hang_id, $ho_ten, $email,$so_dien_thoai,$ngay_sinh,$gioi_tinh,$dia_chi,$trang_thai);
           
                header("location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            }else{
                       // đặt hiển thị xoá session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("location:" . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
            exit();

            }

        }
    }
    public function detailKhachHang()
    {
        $id_khach_hang =$_GET['id_khach_hang'];
        $khach_hang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        $listDonHang =$this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        $listBinhLuan =$this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        require_once './Views/taiKhoan/khachHang/detailKhachHang.php';
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';

        deleteSessionError();   
    }
    public function login()
    {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $email=$_POST['email'];
            $password=$_POST['password'];

            // var_dump($password);die;
            $user = $this->modelTaiKhoan->checkLogin($email,$password);

            if(($user == $email)){
                $_SESSION['user_admin']=$user;
                header("location:".BASE_URL_ADMIN);
                exit();
            }else{
                $_SESSION['error']=$user;
                // var_dump($_SESSION['error']);die;
                $_SESSION['flash']= true;

                header("location:".BASE_URL_ADMIN.'?act=login-admin');
                exit();
            }
        }
    }
        public function logout(){
        if(isset($_SESSION['user_admin'])){
            unset($_SESSION['user_admin']);
        }
            header("location:".BASE_URL_ADMIN.'?act=login-admin');
            exit();
    }

}