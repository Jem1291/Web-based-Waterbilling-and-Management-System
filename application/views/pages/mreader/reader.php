<style>
    .content-container{
        margin-top: 60px;
        margin-left: 16.66666667%;
        background-color: #ffff; 
        border-radius: 10px;
    }
    .label{
        font-size: 20px;
        font-weight: bolder;
    }
    .span{
        font-size: 20px;  
        padding-left: 5px;
        font-style: italic;

    }
    body{
        background-color: #E5E5E5;
    }

    .col-lg-5{
        margin-top: 2%;
        margin-left: 40%;
        background-color: #ffff;
        border-radius: 15px;
    }

    .form-group{
        margin-top: 30px;
        width:500px;
        height: 400px;
        padding-left: 40px;  
    }

    
</style>
<body>
    <?= form_open('add_reading');?>
<div class="content-container">
    <div class="container mt-3 d-flex">
        <div class="content">
            <h3 style="font-style: italic;"><?= $fname.' '.$mname.' '.$lname.' '.$name_ex?></h3>
            <div class="content d-flex">
                <span class="label">Meter no:</span>  
                <span class="span"><?= $meter;?></span>
            </div>
        </div>
        <div class="content" style="padding-top: 9px; padding-left: 20px;">
            <div class="content d-flex">
                <span class="label">Address:</span> 
                <span class="span"><?= $purok.', '.$baranggay?></span>
            </div> 
            <div class="content d-flex">
            <span class="label">Contact no:</span>
            <span class="span"><?= $contact?></span>
            </div> 
        </div>
        <div class="content d-block" style="padding-top: 9px; padding-left: 50px;">
            <div class="content d-flex">
                <span class="label">Status:</span>
                <span class="span">
                    <?php if($status==1){?>
                        <span>Connected</span>
                    <?php }elseif($status==2){?>
                        <span>Disconnected</span>
                    <?php }elseif($status==0){?>
                        <span>Pending</span>
                    <?php }?>
                </span>
            </div>
            <div class="content d-flex">
                <h5>Tag:</h5>
                <span class="span">
                    <?php if($tag==1){?>
                        <div class="green" style="height: 20px; width: 40px; background-color: green;"></div>
                    <?php }elseif($tag==2){?>
                        <div class="yellow" style="height: 20px; width: 40px; background-color: yellow"></div>
                    <?php }elseif($tag==3){?>
                        <div class="red" style="height: 20px; width: 40px; background-color: red"></div>    
                    <?php }elseif($tag==0){?>
                        <div class="grey" style="height: 20px; width: 40px; background-color: grey"></div>
                    <?php }?>
                </span>
            </div> 
        </div>
    </div>
</div>
    <div class="col-lg-5">
        <div class="form-group">
            <h3 style="padding-top: 30px;">Meter Reading:</h3>

            <div class="form-floating mb-2 mt-2">
                <input type="text" name="prev_reading" class="form-control rounded-4" id="floatingInput" value="<?= $prev_reading;?>" readonly>
                <label for="floatingInput">Previous Reading:</label>
            </div>

            <div class="form-floating mb-2 mt-3">
                <input type="text" name="price" class="form-control rounded-4" id="floatingInput" value="<?= $price;?>" readonly>
                <label for="floatingInput">Price/m³:</label>
            </div>

            <div class="form-floating mb-5 mt-2">
                <input type="text" name="reading" class="form-control rounded-4" id="floatingInput" placeholder="reading" required>
                <label for="floatingInput">Reading:</label>
            </div>
            <input type="hidden" name="id" value="<?= $id;?>">
            <input type="hidden" name="price_ID" value="<?= $price_ID;?>">
            <input type="hidden" name="meter_no" value="<?= $meter_ID;?>">

            <button type="submit" class="btn btn-primary px-4" style="width: 400px; margin-left: 40px;">Submit</button>
        </div>
    </div>
    
</body>

   