<?php
require './admin/functions/global.php';
$skills = query_data("SELECT*FROM tbl_skill");
$projects = query_data("SELECT*FROM tbl_project");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
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
  <header>
    <div data-aos="zoom-in" data-aos-duration="2000">
      <h1>Hi, I’m <span>Yohanes Albert</span></h1>
      <h2>Software Engineer</h2>
      <p>Based in Makassar, South Sulawesi, <br>
        Indonesia</p>
      <div class="d-flex justify-content-center pt-5">
        <div class="mx-3 btn-hire">
          <a href="">Hire Me</a>
        </div>
        <div class="mx-3 btn-view">
          <a href="">View Projects</a>
        </div>
      </div>
      <div class="qty-client-project d-flex justify-content-center pt-5">
        <div class="mx-4">
          <img src="assets/icon/Client.png" alt="client" width="30px">
          <span>10+ Client</span>
        </div>
        <div class="mx-4">
          <img src="assets/icon/Project.png" alt="Project" width="18px">
          <span>10+ Project</span>
        </div>
      </div>
    </div>
  </header>
  <div id="about" class="container about" data-aos="zoom-in" data-aos-duration="2000">
    <div class="row">
      <div class="col offset-1">
        <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <h2>About Me</h2>
          <p>I'm a Software Engineer. I am very enthusiastic in studying the
            development of technology, especially in this field of programming.
            And some of the projects that I develop always follow the trend of
            technological developments today.</p>
        </div>
        <div class="mt-5 mb-5" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
          <h2>Experince</h2>
          <div class="mb-1">
            <img src="assets/icon/check.png" alt="check">
            <span class="mx-1">Fullstack Web Developer | Freelancer | Sep 2021 - Oktober 2022</span>
          </div>
          <div>
            <img src="assets/icon/check.png" alt="check">
            <span class="mx-1">Fullstack Web Developer | Freelancer | Sep 2021 - Oktober 2022</span>
          </div>
        </div>
      </div>
      <div class="col offset-1 text-center text-sm-start" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
        <img src="assets/images/profile.png" alt="profile">
      </div>
    </div>
  </div>
  <div id="skill" class="skill">
    <div class="container">
      <h2 class="text-center">My Skills</h2>
      <div class="row justify-content-center justify-content-md-start">
        <?php
        foreach ($skills as $skill) :
        ?>
          <div class="mb-5 col-12 col-sm-10 col-md-6 col-lg-4 d-flex">
            <img src="admin/img/<?= $skill['image'] ?>" width="60px" height="60px" alt="skill">
            <div class="mx-4 component-skill">
              <h4><?= $skill['title'] ?></h4>
              <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?= $skill['progress'] ?>%"></div>
              </div>
            </div>
          </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>
  </div>
  <div class="projects container">
    <h1 class="text-center">Projects</h1>
    <div class="row justify-content-center">
      <?php
      foreach ($projects as $project) :
      ?>
        <div class="mb-4 col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10">
          <div class="card card-custom">
            <img src="admin/img/<?=$project['image']?>" class="card-img-top img-fluid">
            <div class="card-body custom-text">
              <a href="detail.php?id=<?=$project['id']?>"><?=$project['title']?></a>
              <p class="card-text"><?=$project['description']?></p>
            </div>
          </div>
        </div>
      <?php
      endforeach;
      ?>
    </div>
    <div class="text-center mt-4">
      <a href="" class="btn-see-more">See More</a>
    </div>
  </div>
  <div class="interested container">
    <div class="row py-5 justify-content-center justify-content-sm-center justify-content-md-center">
      <div class="text-center text-md-start col-md-10 col-lg-8 offset-xl-1 col-xl-6">
        <h1>Interested collaboration with me ?</h1>
      </div>
      <div class="col-9 col-sm-8 col-md-6 col-lg-5 col-xl-5">
        <div class="d-flex justify-content-lg-end justify-content-xl-end">
          <div class="my-3 mx-lg-2 mx-xl-2"><a href="" class="btn-view-project">View project</a></div>
          <div class="my-3 mx-2 mx-lg-4 mx-xl-4"><a href="" class="btn-contact-me">Contact Me</a></div>
        </div>
      </div>
    </div>
  </div>
  <footer>
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