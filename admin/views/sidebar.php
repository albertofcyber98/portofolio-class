<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-text mx-3">CMS Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= $page == 1 ? 'active' : '' ?>">
    <a class="nav-link" href="index.php">
      <i class="fas fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 2 ? 'active' : '' ?>">
    <a class="nav-link" href="account.php">
      <i class="far fa-user-circle"></i>
      <span>Account</span></a>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 3 ? 'active' : '' ?>">
    <a class="nav-link" href="profile.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Profile</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 9 ? 'active' : '' ?>">
    <a class="nav-link" href="project.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Project</span></a>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 4 ? 'active' : '' ?>">
    <a class="nav-link" href="skills.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Skills</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 8 ? 'active' : '' ?>">
    <a class="nav-link" href="experince.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Experince</span></a>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 5 ? 'active' : '' ?>">
    <a class="nav-link" href="social_media.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Social Media</span></a>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 6 ? 'active' : '' ?>">
    <a class="nav-link" href="tech.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Tech</span></a>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= $page == 7 ? 'active' : '' ?>">
    <a class="nav-link" href="tools.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Tools</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>