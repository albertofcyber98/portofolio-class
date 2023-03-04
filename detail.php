<?php
require 'admin/functions/global.php';
$id_project = $_GET['id'];
$cekData = mysqli_query($conn, "SELECT*FROM tbl_project WHERE id='$id_project'");
$resultData = mysqli_fetch_assoc($cekData);
$resultTechs = query_data("SELECT tbl_tech_select.title as title FROM
tbl_tech INNER JOIN tbl_tech_select
ON tbl_tech.id_tech_select=tbl_tech_select.id WHERE id_project='$id_project'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/aos/dist/aos.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-color-custom">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/images/logo.png" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav color-font-link">
          <a class="nav-link mx-lg-2" href="index.html">Home</a>
          <a class="nav-link mx-lg-4 " href="#">About</a>
          <a class="nav-link" href="project.html">Projects</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="projects-detail container mb-5">
    <h1 class="text-center">Projects</h1>
    <p class="breadcrumb-custom">
      <a href="project.html">Projects</a>
      <span class="garis">/</span>
      <span class="active-breadcrumb"><?= $resultData['title'] ?></span>
    </p>
    <div class="row mt-4 justify-content-center justify-content-lg-start">
      <div class="mb-3 col-12 col-md-8 col-lg-6">
        <div class="card card-custom">
          <img src="admin/img/<?= $resultData['image'] ?>" class="card-img-top img-fluid">
          <div class="card-body custom-text">
            <div class="title"><?= $resultData['title'] ?></div>
            <p class="card-text"><?= $resultData['description'] ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-8 col-lg-5 col-xl-4">
        <div class="card py-3 px-3 card-custom techAndTools">
          <div class="row">
            <div class="col">
              <h6>Tech :</h6>
              <?php
              foreach ($resultTechs as $resultTech) :
              ?>
                <div class="d-flex">
                  <div class="icon-custom">
                    <img src="assets/icon/check.png" alt="">
                  </div>
                  <div class="align-items-center">
                    <div class="py-1"><?=$resultTech['title']?></div>
                  </div>
                </div>
              <?php
              endforeach;
              ?>
            </div>
            <div class="col">
              <h6>Tools :</h6>
              <div class="d-flex">
                <div class="icon-custom">
                  <img src="assets/icon/check.png" alt="">
                </div>
                <div class="align-items-center">
                  <div class="py-1">VS Code</div>
                </div>
              </div>
              <div class="d-flex">
                <div class="icon-custom">
                  <img src="assets/icon/check.png" alt="">
                </div>
                <div class="align-items-center">
                  <div class="py-1">Figma</div>
                </div>
              </div>
              <div class="d-flex">
                <div class="icon-custom">
                  <img src="assets/icon/check.png" alt="">
                </div>
                <div class="align-items-center">
                  <div class="py-1">Laragon</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="projects container">
    <h1 class="text-center">Other projects</h1>
    <div class="row justify-content-center">
      <div class="mb-4 col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10">
        <div class="card card-custom">
          <img src="./assets/images/project.jpg" class="card-img-top img-fluid">
          <div class="card-body custom-text">
            <a href="">Kotlix App</a>
            <p class="card-text">Sebuah aplikasi pemesanan tiket bioskop.
            </p>
          </div>
        </div>
      </div>
      <div class="mb-4 col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10">
        <div class="card card-custom">
          <img src="./assets/images/project.jpg" class="card-img-top img-fluid">
          <div class="card-body custom-text">
            <a href="">Kotlix App</a>
            <p class="card-text">Sebuah aplikasi pemesanan tiket bioskop.
            </p>
          </div>
        </div>
      </div>
      <div class="mb-4 col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10">
        <div class="card card-custom">
          <img src="./assets/images/project.jpg" class="card-img-top img-fluid">
          <div class="card-body custom-text">
            <a href="">Kotlix App</a>
            <p class="card-text">Sebuah aplikasi pemesanan tiket bioskop.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer style="margin-top: 120px;">
    <hr>
    <p class="text-center py-3">2021 Copyright © Yohanes Albert</p>
  </footer>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/aos/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>