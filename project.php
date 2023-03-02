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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
  <div class="projects container mb-5">
    <h1 class="text-center">Projects</h1>
    <div class="row justify-content-center">
      <div class="mb-4 col-xl-4 col-lg-4 col-md-6 col-sm-8 col-10">
        <div class="card card-custom">
          <img src="./assets/images/project.jpg" class="card-img-top img-fluid">
          <div class="card-body custom-text">
            <a href="detail.html">Kotlix App</a>
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
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/aos/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>