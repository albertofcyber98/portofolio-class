<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
require './functions/global.php';
require './functions/function_account.php';
$accounts = query_data('SELECT*FROM tbl_account');
$username = $_SESSION['username'];
$usernameCol = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
    require 'views/link.php';
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $page = 2;
        require 'views/sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require 'views/navbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Account</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Account</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#daftar-data">Tambah Data</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($accounts as $account) :
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $account['username'] ?></td>
                                                <td><?= $account['name'] ?></td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-sm btn-info mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $account['username']; ?>">Ubah</button>
                                                    <?php
                                                    if ($usernameCol !== $account['username']) {
                                                    ?>
                                                        <button class="btn btn-sm btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $account['username']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                                <!-- Start delete modal -->
                                                <div class="modal fade" id="modalHapus<?= $account['username']; ?>" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $username = $account['username'];
                                                                    $edits = query_data("SELECT * FROM tbl_account WHERE username='$username'");
                                                                    foreach ($edits as $edit) :
                                                                    ?>
                                                                        <input type="hidden" name="username" value="<?= $edit['username']; ?>">
                                                                        <p>Yakin untuk menghapus data ?</p>
                                                                        <div class="flex text-center mt-4 mb-3">
                                                                            <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" name="hapus" class="btn btn-danger ml-2">Hapus</button>
                                                                        </div>
                                                                    <?php
                                                                    endforeach
                                                                    ?>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End delete modal -->
                                                <!-- Start update modal -->
                                                <div class="modal fade" id="modalUbah<?= $account['username']; ?>" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ubah Data</h5>
                                                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form role="form" action="" method="POST" autocomplete="off">
                                                                    <?php
                                                                    $username = $account['username'];
                                                                    $edits = query_data("SELECT * FROM tbl_account WHERE username='$username'");
                                                                    foreach ($edits as $edit) :
                                                                    ?>
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-2 col-form-label">Username</label>
                                                                            <div class="col-10">
                                                                                <input type="text" class="form-control" name="username" value="<?= $edit['username'] ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-2 col-form-label">Nama</label>
                                                                            <div class="col-10">
                                                                                <input type="text" class="form-control" name="nama" value="<?= $edit['name'] ?>" placeholder="<?= $edit['name'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row mt-3">
                                                                            <label class="col-2 col-form-label">Password</label>
                                                                            <div class="col-10">
                                                                                <input type="password" class="form-control" name="password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex text-center mt-4 mb-3">
                                                                            <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                            <button type="submit" name="ubah" class="btn btn-info text-white ml-2">Ubah</button>
                                                                        </div>
                                                                    <?php
                                                                    endforeach
                                                                    ?>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End update modal -->
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                    <!-- Start modal -->
                                    <div class="modal modal-custom fade" id="daftar-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="#" autocomplete="off" id="daftarForm">
                                                        <div class="form-group row mt-3">
                                                            <label class="col-3 col-form-label">Nama</label>
                                                            <div class="col">
                                                                <input type="text" class="form-control" name="nama" required placeholder="Nama lengkap">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-3 col-form-label">Username</label>
                                                            <div class="col">
                                                                <input type="text" class="form-control" name="username" required placeholder="Username">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-3">
                                                            <label class="col-3 col-form-label">Password</label>
                                                            <div class="col">
                                                                <input type="password" class="form-control" name="password" required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3 mb-2">
                                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End modal -->
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require 'views/footer.php';
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
    require 'views/modalLogout.php';
    require 'views/script.php';
    if (isset($_POST['tambah'])) {
        // ini diambil dari hasil inputan form tambah
        $username = $_POST['username'];
        // cekData terkait username
        $cekData = mysqli_query($conn, "SELECT*FROM tbl_account WHERE username='$username'");
        // hasil dari mysqli_num_rows itu jumlah row data didatabase
        $resultData = mysqli_num_rows($cekData);

        if ($resultData > 0) {
            echo '
            <script type="text/javascript">
                swal({
                    title: "Gagal",
                    text: "Username sudah terdaftar",
                    icon: "error",
                    showConfirmButton: true,
                }).then(function(isConfirm){
                    if(isConfirm){
                        window.location.replace("account.php");
                    }
                });
            </script>
            ';
        } else {
            if (tambah_data_account($_POST) > 0) {
                echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Ditambahkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("account.php");
                        }
                    });
                </script>
            ';
            } else {
                echo '
                <script type="text/javascript">
                    swal({
                        title: "Gagal",
                        text: "Gagal Ditambahkan",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("account.php");
                        }
                    });
                </script>
            ';
            }
        }
    }
    if (isset($_POST['hapus'])) {
        if (hapus_data_account($_POST['username']) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("account.php");
                        }
                    });
                </script>
            ';
        } else {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Gagal",
                        text: "Gagal Dihapus",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("account.php");
                        }
                    });
                </script>
            ';
        }
    }
    if (isset($_POST['ubah'])) {
        if (ubah_data_account($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("account.php");
                        }
                    });
                </script>
            ';
        } else {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Gagal",
                        text: "Gagal Diubah",
                        icon: "error",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("account.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>