<?php


class AdminDonHang
{
  public $conn;

  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function getAllDonHang()
  {
    try {
      $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
      FROM don_hangs
      INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (Exception $a) {
      echo 'Lỗi' . $a->getMessage();
    }

  }
  public function getDetailDonHang($id)
  {
    try {
      $sql = 'SELECT * FROM don_hangs WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        ':id' => $id
      ]);

      return $stmt->fetch();
    } catch (Exception $a) {
      echo 'Lỗi' . $a->getMessage();
    }

  }
  // public function updateDanhMuc($id, $ten_danh_muc, $mo_ta)
  // {
  //   try {
  //     $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta WHERE id = :id ';
  //     $stmt = $this->conn->prepare($sql);
  //     $stmt->execute([
  //       ':ten_danh_muc' => $ten_danh_muc,
  //       ':mo_ta' => $mo_ta,
  //       ':id' => $id
  //     ]);

  //     return true;
  //   } catch (Exception $a) {
  //     echo 'Lỗi' . $a->getMessage();
  //   }

  // }
  // public function destroyDanhMuc($id)
  // {
  //   try {
  //     $sql = 'DELETE FROM danh_mucs  WHERE id = :id ';
  //     $stmt = $this->conn->prepare($sql);
  //     $stmt->execute([
  //       ':id' => $id
  //     ]);

  //     return true;
  //   } catch (Exception $a) {
  //     echo 'Lỗi' . $a->getMessage();
  //   }

  // }
}