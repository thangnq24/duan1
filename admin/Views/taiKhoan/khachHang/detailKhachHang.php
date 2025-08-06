<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Tài Khoản khách hàng</h1>
                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <img src="<?= BASE_URL .$khachHang['anh_dai_dien']  ?>" style="width:70%" alt=""
                        onerror="this.onerror=null; this.src ='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png'">
                </div>
                <div class="col-8">
                    <div class="container">
                        <table class="table table-borderless">
                            <tbody style="font-size: large;">
                                <tr>
                                    <th>Họ tên:</th>
                                    <td><?=$khach_hang['ho_ten'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày sinh:</th>
                                    <td><?=$khach_hang['ngay_sinh'] ?? ''?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?=$khach_hang['email'] ?? ''?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td><?=$khach_hang['so_dien_thoai'] ?? ''?></td>
                                </tr>
                                <tr>
                                    <th>Giới tính:</th>
                                    <td><?=$khach_hang['gioi_tinh'] ==1 ? 'nam':'nu' ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ:</th>
                                    <td><?=$khach_hang['dia_chi'] ?? ''?></td>
                                </tr>
                                <tr>
                                    <th>Trạng thái</th>
                                    <td><?=$khach_hang['trang_thai'] ==1 ? 'Active':'Anactive' ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-"><h2>Lịch sử bình luận</h2>
                    <div>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản Phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                            <tbody>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <a target="_blank"
                                            href="<?= BASE_URL_ADMIN. '?act=chitietsanpham&id_san_pham='. $binhLuan['san_pham_id']; ?>"><?=  $binhLuan['ten_san_pham']  ?>
                                        </a>
                                    </td>
                                    <td><?= $binhLuan['noi_dung']  ?></td>
                                    <td><?= $binhLuan['ngay_dang']  ?></td>
                                    <td><?= $binhLuan['trang_thai'] == 1 ?'hiển thị' : 'bị ẩn';  ?></td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan&id_binh_luan=' . $binhLuan['id'] ?>"
                                                onclick="return confirm('Bạn có muốn ẩn bình luận này ko?')">
                                                <button class="btn btn-sm btn-danger">ẩn/bỏ ẩn</button>

                                            </a>
                                            <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>">
                                                <input type="hidden" name="id_binh_luan"
                                                    value="<?= $binhLuan['id']  ?>">
                                                <input type="hidden" name="name_view" value="detail_khach" id="">
                                                <button onclick="return confirm('Bạn có muốn ẩn bình luận này ko?') "
                                                    class="btn btn-danger">ẩn/bỏ ẩn
                                                </button>
                                            </form>


                                        </div>
                                    </td>

                                </tr>
                                <?php endforeach ?>

                            </tbody>

                        </table></div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>



</body>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "lengthChange": false,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>

</html>