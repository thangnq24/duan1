<?php

class SanPham
{
  public $conn;

  public function __construct()
  {
    $this->conn = connectDB();
  }

  // Viết hàm lấy toàn bộ danh sách sản phẩm

  public function getAllProduct()
  {
    try {
      $sql = 'SELECT * FROM san_phams';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (Exception $a) {
      echo "Lỗi" . $a->getMessage();
    }
  }
}