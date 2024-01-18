<style>
    .col-lg-5{
        margin-top: 5%;
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
        <?= form_open('add_employee')?>

        <?php if($this->session->flashdata('user_exist')) :?>
            <?= '<p class="alert alert-danger" style="width: 400px;">'.$this->session->flashdata('user_exist').'</p>'?>
        <?php endif;?>
        <?php if($this->session->flashdata('contact_exist')) :?>
            <?= '<p class="alert alert-danger" style="width: 400px;">'.$this->session->flashdata('contact_exist').'</p>'?>
        <?php endif;?>

            <h4 style=""><?= $title?></h4>
            <div class="form-group">
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 300px;">
                        <input type="text" name="fname" class="form-control rounded-4" id="floatingInput" placeholder="Firstname" value="<?= set_value('fname');?>" required>
                        <label for="floatingset_valueInput">First Name</label>
                    </div>
                    <div class="form-floating mb-2" style="width: 100px;">
                        <input type="text" name="mname" class="form-control rounded-4" id="floatingInput" placeholder="Middle Initial" value="<?= set_value('mname');?>">
                        <label for="floatingInput">M.I</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 300px;">
                        <input type="text" name="lname" class="form-control rounded-4" id="floatingInput" placeholder="Last Name" value="<?= set_value('lname');?>" required>
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-2" style="width: 100px;">
                        <input type="text" name="name_ex" class="form-control rounded-4" id="floatingInput" placeholder="Name Extension" value="<?= set_value('name_ex');?>">
                        <label for="floatingInput">Name Ex</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 100px;">
                        <select name="purok" class="drop-down rounded-4" value="<?= set_value('purok');?>" required>
                            <option selected disabled>Purok</option>
                            <option value="1">Purok 1</option>
                            <option value="2">Purok 2</option>
                            <option value="3">Purok 3</option>
                            <option value="4">Purok 4</option>
                            <option value="5">Purok 5</option>
                            <option value="6">Purok 6</option>
                        </select>
                    </div>
                    <div class="form-floating mb-2" style="width: 300px;">
                        <input type="text" name="baranggay" class="form-control rounded-4" id="floatingInput" placeholder="Baranggay:" value="San Roque, Mabini, Bohol" readonly>
                        <label for="floatingset_valueInput">Baranggay:</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 400px;">
                        <input type="text" name="contact" class="form-control rounded-4" id="floatingInput" placeholder="Contact Number" value="<?= set_value('contact');?>" required>
                        <label for="floatingInput">Contact Number</label>
                    </div>
                </div>
                    <div class="form-floating mb-2" style="width: 400px;">
                            <select name="usertype" style="width: 400px;" class="drop-down rounded-4" value="<?= set_value('usertype');?>" required>
                                <option selected disabled>Usertype</option>
                                <option value="Admin">Admin</option>
                                <option value="Cashier">Cashier</option>
                                <option value="Meter reader">Meter Reader</option>
                            </select>
                    </div>
            </div>
            <button type="submit" name="submit" class="btn btn-success" style="width: 400px;">Add Employee</button>
        </div>
