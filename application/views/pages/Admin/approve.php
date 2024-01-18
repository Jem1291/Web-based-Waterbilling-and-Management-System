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
<div class="d-flex">
    <div class="col-lg-5">
    <div style="height: 500px; overflow-y: scroll;">
        <?= form_open('approve/'.$id);?>
        <?php if($this->session->flashdata('meter_exist')) :?>
            <?= '<p class="alert alert-danger" style="width: 400px;">'.$this->session->flashdata('meter_exist').'</p>'?>
        <?php endif;?>
        <div>
        <h4 style=""><?= $title?></h4>
            <div class="d-flex">
                <div class="form-floating mb-2" style="width: 300px;">
                    <input type="text" name="fname" class="form-control rounded-4" id="floatingInput" placeholder="Firstname" value="<?= $fname;?>" readonly>
                    <label for="floatingset_valueInput">First Name</label>
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
                    <select name="purok" class="drop-down rounded-4" readonly>
                        <?php if($purok == "Purok 1"){?> 
                            <option selected value="1">Purok 1</option>
                        <?php } ?>
                        <?php if($purok == "Purok 2"){?> 
                            <option selected value="2">Purok 2</option>
                        <?php } ?>
                        <?php if($purok == "Purok 3"){?> 
                            <option selected value="3">Purok 3</option>
                        <?php } ?> 
                        <?php if($purok == "Purok 4"){?> 
                            <option selected value="4">Purok 4</option>
                        <?php } ?>
                        <?php if($purok == "Purok 5"){?> 
                            <option selected value="5">Purok 5</option>
                        <?php } ?>
                        <?php if($purok == "Purok 6"){?> 
                            <option selected value="6">Purok 6</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-floating mb-2" style="width: 300px;">
                            <input type="text" name="mbaranggay" class="form-control rounded-4" id="floatingInput" placeholder="Baranggay: " value="San Roque, Mabini,Bohol" readonly>
                            <label for="floatingInput">Baranggay:</label>
                        </div>
            </div>
                <div class="form-floating mb-2" style="width: 400px;">
                    <input type="text" name="contact" class="form-control rounded-4" id="floatingInput" placeholder="Contact Number:" value="<?= $contact;?>" required>
                    <label for="floatingInput">Contact Number:</label>
                </div>
        </div>

        <div>
            <h4>Meter Details:</h4>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 100px;">
                        <select name="mpurok" class="drop-down rounded-4" value="<?= set_value('purok');?>" required>
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
                            <input type="text" name="mbaranggay" class="form-control rounded-4" id="floatingInput" placeholder="Baranggay: " value="San Roque, Mabini,Bohol" readonly>
                            <label for="floatingInput">Baranggay:</label>
                        </div>
                    </div>
                    <div class="form-floating mb-2" style="width: 400px;">
                        <input type="text" name="meter_no" class="form-control rounded-4" id="floatingInput" placeholder="Meter Number" value="<?= set_value('meter_no');?>" required>
                        <label for="floatingInput">Meter Number</label>
                    </div>
                    <div class="d-flex">
                        <div class="form-floating mb-2" style="width: 225px;">
                            <input type="text" name="reading" class="form-control rounded-4" id="floatingInput" placeholder="Initial Reading" value="<?= set_value('reading');?>" required>
                            <label for="floatingInput">Initial Reading</label>
                        </div>
                        <div class="form-floating mb-2" style="width: 200px;">
                            <select name="type" class="drop-down rounded-4" value="<?= set_value('type');?>" required>
                                <option selected disabled>Connectivity Type:</option>
                                <option value="1">Residential</option>
                                <option value="2">Commercial</option>
                            </select>
                        </div>
                    </div>
                </div>


                <input type="hidden" name="id" value="<?= $id;?>">
                <input type="hidden" name="login_info_ID" value="<?= $login_info_ID;?>">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="tag" value="1">
                <button type="submit" name="submit" class="btn btn-success" style="width: 400px;">Approve</button>
            </div>
                
    </div>
</div>