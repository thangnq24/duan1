<?php
class Homecontroller
{

  public $modelSanPham;

  public function __construct()
  {
    $this->modelSanPham = new SanPham();
  }
  public function home(
  ) {
    echo "Đây là Home";
  }
  public function trangChu()
  {
    echo "Đây là trang chủ";
  }
  public function danhSachSanPham()
  {
    $listProduct = $this->modelSanPham->getAllProduct();
    var_dump($listProduct);
    die();
  }
}
?>