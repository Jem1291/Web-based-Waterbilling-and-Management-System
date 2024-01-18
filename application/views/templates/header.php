 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRWASA Management</title>

    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>css/css/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>

<div class="sidebar active">
  <div class="logo-content">
    <div class="logo">
      <img src="<?php echo base_url();?>assets/img/srwasa-icon.png" alt="" class="img">
      <div class="logo_name">| SRWASA</div>
    </div>
    <i class='bx bx-menu' id="btn"></i>
  </div> 
  <div class="profile">
          <div class="col">
            <img src="https://www.pngitem.com/pimgs/m/512-5125598_computer-icons-scalable-vector-graphics-user-profile-avatar.png" class="img rounded-circle mx-auto d-block">
            <h4 style="text-align: center; color: white;">
              <?php echo $this->session->userdata['Usertype'];?>
            </h4>
          </div>
        </div>
        <hr style="color: white;">

        <div class="menu">
        <div class="items"><a href="<?= base_url('dashboard');?>" class="item-menu"><i class="bi bi-speedometer2"></i> <span class="label">Dashboard</span></a></div>
          <div class="items"><a href="<?= base_url('consumer');?>" class="item-menu"><i class="bi bi-people-fill"></i> <span class="label">Consumers</span></a></div>
          <div class="items"><a href="<?= base_url('users');?>" class="item-menu"><i class="bi bi-person-fill"></i> <span class="label">Users</span></a></div>
          <div class="items"><a href="<?= base_url('expenses');?>" class="item-menu"><i class="bi bi-cash-stack"></i> <span class="label">Expenses</span></a></div>
          <div class="items">
          <a class="sub-btn"> 
          <i class="bi bi-file-text"></i> <span class="label">Reports</span>
          </a>
                <div class="sub-menu">
                  <a href="<?= base_url('reports');?>" class="sub-item">Income</a>
                  <a href="<?= base_url('collectibles');?>" class="sub-item">Collectibles</a>
                </div>
                 
          </div>
          <div class="items">
          <a class="sub-btn"> 
          <i class="bi bi-gear"></i> 
          <span class="label">Settings</span>
          
          </a>
                <div class="sub-menu">
                  <a href="" class="sub-item">Account Settings</a>
                  <a href="price" class="sub-item">Update Price</a>
                </div>
                 
          </div>
          
          <div class="items">
            <a href="<?= base_url('logout');?>" class="item-menu"><i class="bi bi-box-arrow-right"></i> <span class="label">Logout</span></a>
          </div>
        </div>
</div>

  <!-- <nav class="navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Welcome <?php echo $this->session->userdata['Usertype'];?>!</a>

        <form class="d-flex" role="search" method="post" action="<?= base_url();?>view_consumer">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
          </form>
      </div>
  </nav> -->

  <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background: #00295A">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
            <a class="navbar-brand" href="#">Welcome <?php echo $this->session->userdata['Usertype'];?>!</a>
            </li>
          </ul>
          <form class="d-flex" role="search" method="post" action="<?= base_url('search');?>">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  
  <script>
    $(document).ready(function(){
        $('.sub-btn').click(function(){
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate');
    });
    })
</script>


  

