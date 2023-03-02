<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
require './functions/function_detail_project.php';
$username = $_SESSION['username'];
$id_project = $_GET['id'];
$techs = query_data("SELECT tbl_tech_select.title as nama, tbl_tech.id as id FROM
tbl_tech INNER JOIN tbl_tech_select
ON tbl_tech_select.id=tbl_tech.id_tech_select
WHERE tbl_tech.id_project='$id_project'");

$cekNama = mysqli_query($conn, "SELECT*FROM tbl_project WHERE id='$id_project'");
$resultNama = mysqli_fetch_assoc($cekNama);
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
        $page = 9;
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
                    <h1 class="h3 mb-2 text-gray-800">Project : <?= $resultNama['title'] ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="project.php">Project</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail tech & tools</li>
                        </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Tech</h6>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#daftar-data-tech">Tambah Data</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($techs === []) {
                                                ?>
                                                    <tr>
                                                    <td colspan="3" class="text-center">No Data</td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    $no = 1;
                                                    foreach ($techs as $tech) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $tech['nama'] ?></td>
                                                            <td class="align-middle text-center">
                                                                <button class="btn btn-sm btn-info mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah">Ubah</button>
                                                                <button class="btn btn-sm btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapusTech<?= $tech['id'] ?>">Hapus</button>
                                                            </td>
                                                            <!-- Start delete modal -->
                                                            <div class="modal fade" id="modalHapusTech<?= $tech['id'] ?>" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Hapus Data</h5>
                                                                            <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" action="" method="POST" autocomplete="off">
                                                                                <?php
                                                                                $id = $tech['id'];
                                                                                $edits = query_data("SELECT * FROM tbl_tech WHERE id='$id'");
                                                                                foreach ($edits as $edit) :
                                                                                ?>
                                                                                    <input type="hidden" name="id" value="<?= $edit['id']; ?>">
                                                                                    <p>Yakin untuk menghapus data ?</p>
                                                                                    <div class="flex text-center mt-4 mb-3">
                                                                                        <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Batal</button>
                                                                                        <button type="submit" name="hapus_tech" class="btn btn-danger ml-2">Hapus</button>
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
                                                            <div class="modal fade" id="modalUbah<?= $project['id']; ?>" role="dialog">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Ubah Data</h5>
                                                                            <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                                                                                <?php
                                                                                $id = $project['id'];
                                                                                $edits = query_data("SELECT * FROM tbl_project WHERE id='$id'");
                                                                                foreach ($edits as $edit) :
                                                                                ?>
                                                                                    <input type="hidden" class="form-control" name="id" value="<?= $edit['id'] ?>">
                                                                                    <input type="hidden" class="form-control" name="image_lama" value="<?= $edit['image'] ?>">
                                                                                    <div class="form-group row mt-3">
                                                                                        <label class="col-3 col-form-label">Title</label>
                                                                                        <div class="col">
                                                                                            <input type="text" class="form-control" name="title" value="<?= $edit['title'] ?>" placeholder="Title">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row mt-3">
                                                                                        <label class="col-3 col-form-label">Description</label>
                                                                                        <div class="col">
                                                                                            <textarea name="description" class="form-control" id="" cols="30" rows="3"><?= $edit['description'] ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row mt-3">
                                                                                        <label class="col-3 col-form-label">Image</label>
                                                                                        <div class="col">
                                                                                            <input type="file" class="form-control" name="image">
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
                                                }
                                                ?>
                                            </tbody>
                                            <!-- Start modal -->
                                            <div class="modal modal-custom fade" id="daftar-data-tech" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambah Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="#" autocomplete="off" id="daftarForm">
                                                                <div class="form-group row mt-3">
                                                                    <input type="hidden" name="id_project" value="<?= $id_project ?>">
                                                                    <label class="col-3 col-form-label">Name Tech</label>
                                                                    <div class="col">
                                                                        <select name="id_tech" id="" class="form-control">
                                                                            <option selected>--Pilih--</option>
                                                                            <?php
                                                                            $select_techs = query_data("SELECT*FROM tbl_tech_select");
                                                                            foreach ($select_techs as $select_tech) :
                                                                            ?>
                                                                                <option value="<?= $select_tech['id'] ?>"><?= $select_tech['title'] ?></option>
                                                                            <?php
                                                                            endforeach;
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center mt-3 mb-2">
                                                                    <button type="submit" name="tambah_tech" class="btn btn-primary">Tambah</button>
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
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Tools</h6>
                                </div>
                                <div class="card-body">
                                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#daftar-data">Tambah Data</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>Tech & Tools</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($projects as $project) :
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $project['title'] ?></td>
                                                        <td><img src="./img/<?= $project['image'] ?>" width="100px" alt=""></td>
                                                        <td><?= $project['description'] ?></td>
                                                        <td></td>
                                                        <td class="align-middle text-center">
                                                            <button class="btn btn-sm btn-info mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $project['id']; ?>">Ubah</button>
                                                            <button class="btn btn-sm btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $project['id']; ?>">Hapus</button>
                                                        </td>
                                                        <!-- Start delete modal -->
                                                        <div class="modal fade" id="modalHapus<?= $project['id']; ?>" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Hapus Data</h5>
                                                                        <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="" method="POST" autocomplete="off">
                                                                            <?php
                                                                            $id = $project['id'];
                                                                            $edits = query_data("SELECT * FROM tbl_project WHERE id='$id'");
                                                                            foreach ($edits as $edit) :
                                                                            ?>
                                                                                <input type="hidden" name="id" value="<?= $edit['id']; ?>">
                                                                                <input type="hidden" name="image_lama" value="<?= $edit['image']; ?>">
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
                                                        <div class="modal fade" id="modalUbah<?= $project['id']; ?>" role="dialog">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Ubah Data</h5>
                                                                        <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form role="form" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                                                                            <?php
                                                                            $id = $project['id'];
                                                                            $edits = query_data("SELECT * FROM tbl_project WHERE id='$id'");
                                                                            foreach ($edits as $edit) :
                                                                            ?>
                                                                                <input type="hidden" class="form-control" name="id" value="<?= $edit['id'] ?>">
                                                                                <input type="hidden" class="form-control" name="image_lama" value="<?= $edit['image'] ?>">
                                                                                <div class="form-group row mt-3">
                                                                                    <label class="col-3 col-form-label">Title</label>
                                                                                    <div class="col">
                                                                                        <input type="text" class="form-control" name="title" value="<?= $edit['title'] ?>" placeholder="Title">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row mt-3">
                                                                                    <label class="col-3 col-form-label">Description</label>
                                                                                    <div class="col">
                                                                                        <textarea name="description" class="form-control" id="" cols="30" rows="3"><?= $edit['description'] ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row mt-3">
                                                                                    <label class="col-3 col-form-label">Image</label>
                                                                                    <div class="col">
                                                                                        <input type="file" class="form-control" name="image">
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
                                                            <form method="post" action="#" autocomplete="off" id="daftarForm" enctype="multipart/form-data">
                                                                <div class="form-group row mt-3">
                                                                    <label class="col-3 col-form-label">Title</label>
                                                                    <div class="col">
                                                                        <input type="text" class="form-control" name="title" required placeholder="Title">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mt-3">
                                                                    <label class="col-3 col-form-label">Description</label>
                                                                    <div class="col">
                                                                        <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mt-3">
                                                                    <label class="col-3 col-form-label">Image</label>
                                                                    <div class="col">
                                                                        <input type="file" class="form-control" name="image" required>
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
    if (isset($_POST['tambah_tech'])) {
        if (tambah_tech($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Ditambahkan",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("detail_project.php?id=' . $id_project . '");
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
                            window.location.replace("detail_project.php?id=' . $id_project . '");
                        }
                    });
                </script>
            ';
        }
    }
    if (isset($_POST['hapus_tech'])) {
        if (delete_tech($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Dihapus",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("detail_project.php?id=' . $id_project . '");
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
                            window.location.replace("detail_project.php?id=' . $id_project . '");
                        }
                    });
                </script>
            ';
        }
    }
    if (isset($_POST['ubah'])) {
        if (edit_project($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("project.php");
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
                            window.location.replace("project.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>