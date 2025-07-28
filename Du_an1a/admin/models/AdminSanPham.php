<?php


class AdminSanPham
{
  public $conn;

  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function getAllSanPham()
  {
    try {
      $sql = 'SELECT * FROM san_phams';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (Exception $a) {
      echo 'Lỗi' . $a->getMessage();
    }

  }
  public function insertSanPham($ten_san_pham, $mo_ta, $gia, $so_luong, $ngay_nhap)
  {
    try {
      $sql = 'INSERT INTO san_phams (ten_san_pham, mo_ta, gia, so_luong, ngay_nhap)
      VALUES (:ten_san_pham, :mo_ta, :gia, :so_luong, :ngay_nhap)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':ten_san_pham' => $ten_san_pham,
        ':mo_ta' => $mo_ta,
        ':gia' => $gia,
        ':so_luong' => $so_luong,
        ':ngay_nhap' => $ngay_nhap,
      ]);

      return true;
    } catch (Exception $a) {
      echo 'Lỗi' . $a->getMessage();
    }

  }
  public function getDetailSanPham($id)
  {
    try {
      $sql = 'SELECT * FROM san_phams WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':id' => $id
      ]);

      return $stmt->fetch();
    } catch (Exception $a) {
      echo 'Lỗi' . $a->getMessage();
    }

  }
  public function updateSanPham($id, $ten_san_pham, $mo_ta, $gia, $so_luong, $ngay_nhap)
  {
    try {
      $sql = 'UPDATE san_phams SET ten_san_pham = :ten_san_pham, mo_ta = :mo_ta, gia = :gia, so_luong = :so_luong, ngay_nhap = :ngay_nhap WHERE id = :id ';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':ten_san_pham' => $ten_san_pham,
        ':mo_ta' => $mo_ta,
        ':gia' => $gia,
        ':so_luong' => $so_luong,
        ':ngay_nhap' => $ngay_nhap,
        ':id' => $id
      ]);

      return true;
    } catch (Exception $a) {
      echo 'Lỗi' . $a->getMessage();
    }

  }
  public function destroySanPham($id)
  {
    try {
      $sql = 'DELETE FROM san_phams  WHERE id = :id ';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':id' => $id
      ]);

      return true;
    } catch (Exception $a) {
      echo 'Lỗi' . $a->getMessage();
    }

  }
}