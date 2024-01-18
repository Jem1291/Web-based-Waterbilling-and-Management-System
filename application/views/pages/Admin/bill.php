<style>
  body {
    background: #fff;
  }

  .content {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .logo {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
  }

  .logo img {
    width: 30px;
    height: 30px;
  }

  .logo_name {
    font-weight: bold;
    font-size: 20px;
    margin-left: 5px;
  }

  .bill {
    display: flex;
    flex-direction: column;
    align-items: justify;
  }

  .bill p {
    margin: 5px 0;
  }

  .d-flex {
    display: flex;
  }

  .d-flex p {
    margin-right: 10px;
  }

  .pbtn {
    display: none;
    width: 300px;
  }

  @media print {
    .sidebar,
    .navbar {
      display: hidden;
    }
  }
</style>

<div class="col-sm-10">
  <div class="content">
    <div class="logo">
      <img src="<?php echo base_url();?>assets/img/srwasa-icon.png" alt="" class="img">
      <div class="logo_name">| Labawan Water Utility</div>
    </div>
    <div class="bill">
      <p>Date: <strong><?= $date;?></strong></p>
      <p>Fullname: <strong><?= $fname.' '.$mname.' '.$lname.' '.$name_ex ?></strong></p>
      <p>Meter No: <strong><?= $meter;?></strong></p>
      <p>Previous reading: <strong><?= $prev_read;?></strong></p>
      <p>Present reading: <strong><?= $present_read;?></strong></p>
      <p style="font-size: 20px; font-weight: bold;">Total Payable: <strong> ₱<?= $amount;?>.00</strong></p>
    </div>
    <button type="button" class="btn btn-lg btn-primary pbtn" id="printButton" onclick="window.print()">Print</button>
  </div>
</div>

<script>

  window.onload = function() {
    var printButton = document.getElementById("printButton");
    var sidebar = document.querySelector(".sidebar");
    var navbar = document.querySelector(".navbar");

    printButton.style.display = "block";
    sidebar.style.display = "block";
    navbar.style.display = "block";
  }

  window.onbeforeprint = function() {
    var printButton = document.getElementById("printButton");
    var sidebar = document.querySelector(".sidebar");
    var navbar = document.querySelector(".navbar");

    printButton.style.display = "none";
    sidebar.style.display = "none";
    navbar.style.display = "none";
  }

  window.onafterprint = function() {
    var printButton = document.getElementById("printButton");
    var sidebar = document.querySelector(".sidebar");
    var navbar = document.querySelector(".navbar");

    printButton.style.display = "block";
    sidebar.style.display = "block";
    navbar.style.display = "block";
  } 
</script>
