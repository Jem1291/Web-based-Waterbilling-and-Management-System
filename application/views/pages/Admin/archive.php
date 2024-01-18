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
        <?= form_open('archive/'.$id);?>
            <h4><?= $title?></h4>
            <div class="form-group">
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 300px;">
                        <input type="text" name="fname" class="form-control rounded-4" id="floatingInput" placeholder="Firstname" value="<?= $fname;?>" required>
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mb-2" style="width: 100px;">
                        <input type="text" name="mname" class="form-control rounded-4" id="floatingInput" placeholder="Middle Initial" value="<?= $mname;?>">
                        <label for="floatingInput">M.I</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 300px;">
                        <input type="text" name="lname" class="form-control rounded-4" id="floatingInput" placeholder="Last Name" value="<?= $lname;?>" required>
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-2" style="width: 100px;">
                        <input type="text" name="name_ex" class="form-control rounded-4" id="floatingInput" placeholder="Name Extension" value="<?= $name_ex;?>">
                        <label for="floatingInput">Name Ex</label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-floating mb-2" style="width: 100px;">
                        <select name="purok" class="drop-down rounded-4" required>
                            <?php if($purok=="Purok 1"){?>
                                <option selected value="1"><?= $purok?></option>
                            <?php }?>
                            <?php if($purok=="Purok 2"){?>
                                <option selected value="2"><?= $purok?></option>
                            <?php }?>
                            <?php if($purok=="Purok 3"){?>
                                <option selected value="3"><?= $purok?></option>
                            <?php }?>
                            <?php if($purok=="Purok 4"){?>
                                <option selected value="4"><?= $purok?></option>
                            <?php }?>
                            <?php if($purok=="Purok 5"){?>
                                <option selected value="5"><?= $purok?></option>
                            <?php }?>
                            <?php if($purok=="Purok 6"){?>
                                <option selected value="6"><?= $purok?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-floating mb-2" style="width: 300px;">
                            <input type="text" name="baranggay" class="form-control rounded-4" id="floatingInput" placeholder="Baranggay: " value="San Roque, Mabini,Bohol" readonly>
                            <input type="hidden" name="baranggay" class="form-control rounded-4" id="floatingInput" placeholder="Baranggay: " value="1" readonly>
                            <label for="floatingInput">Baranggay:</label>
                        </div>

                </div>
                <div class="form-floating mb-2" style="width: 400px;">
                    <input type="text" name="contact" class="form-control rounded-4" id="floatingInput" placeholder="Contact Number" value="<?= $contact;?>" required>
                    <label for="floatingInput">Contact Number</label>
                </div>
                <div class="form-floating mb-2" style="width: 400px;">
                    <input type="text" name="meter_no" class="form-control rounded-4" id="floatingInput" placeholder="Meter Number" value="<?= $meter_no;?>" required>
                    <label for="floatingInput">Meter Number</label>
                </div>
                <input type="hidden" name="id" value="<?= $id;?>">
                <input type="hidden" name="con_date" value="<?= $con_date?>">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="tag" value="1">
                <input type="hidden" name="login_info_ID" value="<?= $login_info_ID;?>">
            </div>
            <button type="submit" name="submit" class="btn btn-danger" style="width: 400px;">Archive</button>
        </div>