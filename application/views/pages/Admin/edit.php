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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
    .col-lg-5{
        margin-top: 6%;
        margin-left: 40%;
    }
    .form-group{
        width: 500px;
    }
    .form-control{
        margin-bottom: 10px;
    }
    .btn{
        height:40px;
        width: 90px;

    }
    .drop-down{
        padding: 17px 11px;
        color: #333;
        background-color: #fff;
        border: 1px solid #dddd;
        cursor: pointer;
    }
    .dropdown{
        padding: 17px 11px;
        width: 300px;
        color: #333;
        background-color: #fff;
        border: 1px solid #dddd;
        cursor: pointer;
    }
</style>
<body>
<div class="row">
    <div class="col-lg-5">
        <?= form_open('edit/'.$id);?>
            <h4 style=""><?= $title?></h4>
            <div class="form-group">
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 300px;">
                        <input type="text" name="fname" class="form-control rounded-4" id="floatingInput" placeholder="Firstname" value="<?= $fname;?>" readonly>
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mb-2" style="width: 100px;">
                        <input type="text" name="mname" class="form-control rounded-4" id="floatingInput" placeholder="Middle Initial" value="<?= $mname;?>" readonly>
                        <label for="floatingInput">M.I</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 300px;">
                        <input type="text" name="lname" class="form-control rounded-4" id="floatingInput" placeholder="Last Name" value="<?= $lname;?>" readonly>
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-2" style="width: 100px;">
                        <input type="text" name="name_ex" class="form-control rounded-4" id="floatingInput" placeholder="Name Extension" value="<?= $name_ex;?>" readonly>
                        <label for="floatingInput">Name Ex</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 100px;">
                        <input type="text" name="purok" class="form-control rounded-4" id="floatingInput" placeholder="Purok" value="<?= $purok;?>" readonly>
                        <label for="floatingInput">Purok</label>
                    </div>
                    <div class="form-floating mb-2" style="width: 300px;">
                        <input type="text" name="baranggay" class="form-control rounded-4" id="floatingInput" placeholder="Baranggay" value="San Roque, Mabini, Bohol" readonly>
                        <label for="floatingInput">Baranggay</label>
                    </div>
                </div>
                <div class="form-floating mb-2" style="width: 400px;">
                    <input type="text" name="contact" class="form-control rounded-4" id="floatingInput" placeholder="Contact Number" value="<?= $contact;?>" required>
                    <label for="floatingInput">Contact Number</label>
                </div>
                <div class="form-floating mb-2" style="width: 400px;">
                    <input type="text" name="meter_no" class="form-control rounded-4" id="floatingInput" placeholder="Meter Number" value="<?= $meter_no;?>" readonly>
                    <label for="floatingInput">Meter Number</label>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 200px;">
                    <button type="submit" name="submit" class="btn btn-success" style="width: 400px;">Update</button>
                </div>
                </div>
                <input type="hidden" name="id" value="<?= $id;?>">
            </div>
                
        </div>