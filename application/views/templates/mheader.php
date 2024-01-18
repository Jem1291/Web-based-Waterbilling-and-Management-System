<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRWASA Management</title>
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css" /> 
    <link href="sticky-footer-navbar.css" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background: #00295A">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SRWASA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Welcome <?php echo $this->session->userdata['Usertype'];?>!</a>
            </li>
          </ul>
          <form class="d-flex" role="search" method="post" action="<?= base_url();?>view_consumer">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class=" col-sm-2 bg-light sidebar position-fixed" style="top: 56px; bottom: 0;  background: linear-gradient(to bottom, #00295A, #003B82, #083E85, #004CC9, #004CC9);">
      <div class="row mb-4 mt-4">
          <div class="col">
          <img src="https://www.pngitem.com/pimgs/m/512-5125598_computer-icons-scalable-vector-graphics-user-profile-avatar.png" class="rounded-circle mx-auto d-block" width="90" height="90">
            <h4 style="text-align: center; color: white;"><?php echo $this->session->userdata['Usertype'];?></h4>
          </div>
        </div>
        <hr style="color: white;">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active text-white" href="<?= base_url('view_consumer');?>">Meter Reading</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" href="#">Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" href="<?= base_url('logout');?>">Logout</a>
          </li>

        </ul>
      </nav>