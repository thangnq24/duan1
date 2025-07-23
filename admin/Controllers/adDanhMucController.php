<?php
class adDanhMucController{
public $modelDanhMuc;

public function __construct()
{
    $this->modelDanhMuc = new adDanhMuc();
}

    public function danhSachDanhMuc(){

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once 'Views/DanhMuc/adDanhMucView.php';
    }
}
?>