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
<style>
    .col-lg-5{
        margin-top: 10%;
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
<div class="row">
    <div class="col-lg-5">
        <?= form_open('edit_user/'.$id)?>

        <?php if($this->session->flashdata('user_exist')) :?>
            <?= '<p class="alert alert-danger" style="width: 400px;">'.$this->session->flashdata('user_exist').'</p>'?>
        <?php endif;?>
        <?php if($this->session->flashdata('contact_exist')) :?>
            <?= '<p class="alert alert-danger" style="width: 400px;">'.$this->session->flashdata('contact_exist').'</p>'?>
        <?php endif;?>

            <h4 style=""><?= $title?></h4>
            <div class="form-group">
                    <div class="form-floating mb-2" style="width: 400px;">
                        <input type="text" name="username" class="form-control rounded-4" id="floatingInput" placeholder="Username" value="<?= $username;?>"readonly>
                        <label for="floatingset_valueInput">Username</label>
                    </div>
                    <div class="form-floating mb-2" style="width: 400px;">
                        <input type="password" name="password" class="form-control rounded-4" id="floatingInput" placeholder="Password" value="<?= set_value('password');?>" required>
                        <label for="floatingInput">Password</label>
                        <input type="hidden" name="id" value="<?= $id;?>">
                        <input type="hidden" name="Usertype" value="<?= $Usertype;?>">
                    </div>
                
            </div>
            <button type="submit" name="submit" class="btn btn-success" style="width: 400px;">Edit</button>
        </div>
