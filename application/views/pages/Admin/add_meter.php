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
</style>

<div class="row">
    <div class="col-lg-5">
        <?= form_open('add_newMeter')?>

        <?php if($this->session->flashdata('meter_exist')) :?>
            <p class="alert alert-danger" style="width: 400px;"><?= $this->session->flashdata('meter_exist')?></p>
        <?php endif;?>
        
        <div class="form-group">
            <h3 style="font-style: italic;"><?= $fname.' '.$mname.' '.$lname.' '.$name_ex?></h3>
            <h5>Address: <span class="span"><?= $purok.', '.$baranggay?></span></h5>
            <br>
            <?= $title; ?>
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
                            <input type="text" name="mbaranggay" class="form-control rounded-4" id="floatingInput" placeholder="Baranggay: " value="San Roque, Mabini,Bohol" readonly>
                            <label for="floatingInput">Baranggay:</label>
                        </div>
                    </div>
            <div class="form-floating mb-2" style="width: 400px;">
                <input type="text" name="meter" class="form-control rounded-4" id="floatingInput" placeholder="Meter Number" value="<?= set_value('meter');?>" required>
                <label for="floatingInput">Meter Number</label>
            </div>

            <div class="d-flex">

                <div class="form-floating mb-2" style="width: 225px;">
                    <input type="text" name="present_read" class="form-control rounded-4" id="floatingInput2" placeholder="Initial Reading" value="<?= set_value('present_read');?>" required>
                    <label for="floatingInput2">Initial Reading:</label>
                    <input type="hidden" name="previous_read" value="0">
                    <input type="hidden" name="present_rate" value="0">
                    <input type="hidden" name="id" value="<?= $id;?>">
                </div>
            
                <div class="form-floating mb-2" style="width: 200px;">
                    <select name="type" class="drop-down rounded-4" required>
                        <option disabled selected>Connectivity Type:</option>
                        <option value="1" <?= set_select('type', '1') ?>>Residential</option>
                        <option value="2" <?= set_select('type', '2') ?>>Commercial</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-success" style="width: 400px;">Add Meter</button>
        
        <?= form_close() ?>
    </div>
</div>
