<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
require './functions/function_profile.php';
$profiles = query_data('SELECT*FROM tbl_profil');
$username = $_SESSION['username'];
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
        $page = 3;
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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Profile</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 py-4 px-5">
                        <?php
                        foreach ($profiles as $profile) :
                        ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="text-center my-3">
                                    <img src="img/<?= $profile['image'] ?>" width="300px" alt="">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Name</label>
                                            <div class="col">
                                                <input type="hidden" name="id" value="<?= $profile['id'] ?>">
                                                <input type="hidden" name="image_lama" value="<?= $profile['image'] ?>">
                                                <input type="text" name="nama" value="<?= $profile['name'] ?>" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Job Name</label>
                                            <div class="col">
                                                <input type="text" name="job_name" value="<?= $profile['job_name'] ?>" class="form-control" placeholder="Job Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">About</label>
                                            <div class="col">
                                                <textarea name="about" class="form-control" cols="30" rows="3" placeholder="About yourself"><?= $profile['about'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Address</label>
                                            <div class="col">
                                                <textarea name="address" class="form-control" cols="30" rows="3" placeholder="Your Address"><?= $profile['address'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">No Telpon</label>
                                            <div class="col">
                                                <input type="text" name="no_telpon" value="<?= $profile['no_telpon'] ?>" class="form-control" placeholder="+62817271xxxx">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row mt-3">
                                            <label class="col-2 col-form-label">Image profile</label>
                                            <div class="col">
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center my-3">
                                    <button class="btn btn-info" type="submit" name="ubah">Update Profile</button>
                                </div>
                            </form>
                        <?php
                        endforeach;
                        ?>
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
    if (isset($_POST['ubah'])) {
        if (ubah_data_profile($_POST) > 0) {
            echo '
                <script type="text/javascript">
                    swal({
                        title: "Berhasil",
                        text: "Berhasil Diubah",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm){
                        if(isConfirm){
                            window.location.replace("profile.php");
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
                            window.location.replace("profile.php");
                        }
                    });
                </script>
            ';
        }
    }
    ?>



</body>

</html>