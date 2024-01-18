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
    <link rel="stylesheet" href="<?= base_url() ?>/css/css/style.css" /> 
    <link href="sticky-footer-navbar.css" rel="stylesheet">
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
          <div class="items">
          <a class="sub-btn"> 
            <i class="bi bi-speedometer2"></i> <span class="label">Dashboard</span> 
            <i class='bx bx-chevron-right dropdown'></i>
            
          </a>
                <div class="sub-menu">
              
                  <?php 
                    if (isset($meter)) {
                      foreach ($meter as $value) { ?>
                        <a href="<?= base_url('dashboard/').$value->meter_no;?>" class="sub-item"><?= $value->meter_no;?></a>
                  <?php  
                      } 
                    }
                ?>
                </div>
                 
          </div>
          <div class="items">
            <a class="sub-btn">
              <i class="bi bi-droplet-half"></i>
                <span class="label">Consumption</span>
              <i class='bx bx-chevron-right dropdown'></i>
            </a>
                <div class="sub-menu">
                <?php 
                if (isset($meter)) {
                  foreach ($meter as $value) { ?>
                    <a href="<?= base_url('single/').$value->meter_no;?>" class="sub-item"><?= $value->meter_no;?></a>
              <?php  
                  } 
                }
             ?>
                </div>
          </div>
          <div class="items"><a href="" class="item-menu"><i class="bi bi-gear"></i> <span class="label">Settings</span></a></div>
          <div class="items">
            <a href="<?= base_url('logout');?>" class="item-menu"><i class="bi bi-box-arrow-right"></i> <span class="label">Logout</span></a>
          </div>
        </div>
</div>

  <nav class="navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Welcome <?php echo $this->session->userdata['Usertype'];?>!</a>
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


  

