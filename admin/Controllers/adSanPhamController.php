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

        deleteSessionError();
    }

     public function postaddSanPham(){
        // xử lý thêm dữ liệu

        // kiểm tra dữ liệu
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
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

            if($hinh_anh['error'] !== 0){
                $errors['hinh_anh'] = 'chọn hình ảnh';
            }

            $_SESSION['error'] = $errors;


            // nếu không lỗi thì tiến hành thêm sản phẩm
            if(empty($errors)){
             
            $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai,$mo_ta,$file_thumb);
            // thêm album ảnh sản phẩm
            if(!empty($img_array['name'])){
                foreach($img_array['name'] as $key=>$value){
                    $file = [
                        'name' => $img_array['name'][$key],
                        'type' => $img_array['type'][$key],
                        'tmp_name' => $img_array['tmp_name'][$key],
                        'error' => $img_array['error'][$key],
                        'size' => $img_array['size'][$key]
                    ];

                    $linh_hinh_anh = uploadFile($file, './uploads/');
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$linh_hinh_anh);
                }
            }


            header("location:" . BASE_URL_ADMIN . '?act=sanpham');
            exit();
            }else{
                       // đặt hiển thị xoá session sau khi hiển thị form
                       $_SESSION['flash'] = true;
                       header("location:" . BASE_URL_ADMIN . '?act=form-themsanpham');
            exit();

            }

        }
    }
       
    // sửa sản phẩm
      public function formEditSanPham(){
        // hiển thị form nhập
         $id = $_GET['id_san_pham'];
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        //var_dump($sanpham);die;
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if($sanpham){
             require_once 'Views/SanPham/editSanPhamView.php';
             deleteSessionError();
        }
        else{
             header("location:" . BASE_URL_ADMIN . '?act=sanpham');
            exit();
        }
       
    }

    
    

    public function postEditSanPham(){
        // xử lý thêm dữ liệu

        // kiểm tra dữ liệu
        // lấy dữ liệu cũ của sản phẩm
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // lấy dữ liệu
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // truy vấn

            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // lấy ảnh cũ để sửa ảnh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            
           



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

           

            $_SESSION['error'] = $errors;
            

            //logic sửa ảnh
            
            if(isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK){
               // up ảnh mới
               $new_file = uploadFile($hinh_anh, './uploads/');
                
               if(!empty($old_file)){
                deleteFile($old_file);
               }
              
            }else{
                $new_file = $old_file;
               }

              
            // nếu không lỗi thì tiến hành thêm sản phẩm
            if(empty($errors)){
             
         $this->modelSanPham->updateSanPham( $san_pham_id, $ten_san_pham, $gia_san_pham,$gia_khuyen_mai,$so_luong,$ngay_nhap,$danh_muc_id,$trang_thai,$mo_ta,$new_file);
           


            header("location:" . BASE_URL_ADMIN . '?act=sanpham');
            exit();
            }else{
                       // đặt hiển thị xoá session sau khi hiển thị form
                       $_SESSION['flash'] = true;
                       header("location:" . BASE_URL_ADMIN . '?act=form-suasanpham&id_san_pham=' . $san_pham_id);
            exit();

            }

        }
    }

    public function postEditAnhSanPham(){
       if($_SERVER['REQUEST_METHOD']=='POST'){
        $san_pham_id = $_POST['san_pham_id'] ?? '';

        // lấy danh sách ảnh của sản phẩm
        $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
        // xử lý ảnh
        $img_array = $_FILES['img_array'];
        $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
        $current_img_ids = $_POST['current_img_ids'] ?? [];

        // khai báo mảng để lưu ảnh thêm mới hoặc thay thế
        $upload_file = [];

        foreach($img_array['name'] as $key=>$value){
            if($img_array['error'][$key] == UPLOAD_ERR_OK){
              $new_file = uploadFileAlbum($img_array, './uploads/', $key);
              if($new_file){
                $upload_file[] = [
                    'id' => $current_img_ids[$key] ?? null,
                    'file' => $new_file
                ];
              }
            }
        }
    
        // lưu ảnh mới và xoá ảnh cũ
        foreach($upload_file as $file_info){
            if($file_info['id']){
                $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                // cập nhật ảnh cũ
                $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
                 // xoá ảnh cũ
                 deleteFile($old_file);

            }else{
                //  thêm ảnh mới
                $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
            }
        
        }
         // xử lý xoá ảnh
         foreach($listAnhSanPhamCurrent as $anhSP){
            $anh_id = $anhSP['id'];
            if(in_array($anh_id, $img_delete)){
                // xoá ảnh
                $this->modelSanPham->destroyAnhSanPham($anh_id);

                // xoá file
                deleteFile( $anhSP['link_hinh_anh']);
            }
            }
             header("location:" . BASE_URL_ADMIN . '?act=form-suasanpham&id_san_pham=' . $san_pham_id);
            exit();
        }
       
    
    }
    
    
       public function deleteSanPham(){
         $id = $_GET['id_san_pham'];
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        if($sanpham){
             deleteFile($sanpham['hinh_anh']);
         $this->modelSanPham->destroySanPham($id);

    }

          if($listAnhSanPham){
            foreach($listAnhSanPham as $key=>$anhSP ){
                deleteFile($anhSP['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
            }
          }
              header("location:" . BASE_URL_ADMIN . '?act=sanpham');
            exit();
        
    }

     public function detailSanPham(){
        // hiển thị form nhập
         $id = $_GET['id_san_pham'];
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        //var_dump($sanpham);die;
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        
        if($sanpham){
             require_once 'Views/SanPham/detailSanPhamView.php';
             
        }
        else{
             header("location:" . BASE_URL_ADMIN . '?act=sanpham');
            exit();
        }
       
    }
       
    
}   

?>