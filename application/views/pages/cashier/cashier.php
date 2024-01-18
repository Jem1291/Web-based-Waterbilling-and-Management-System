<style>
    .col-sm-10{
        margin-top: 60px;
        margin-left: 16.66666667%;
        background-color: #ffff; 
        border-radius: 10px;
    }
    .my-hr {
        width: 100%;
        border-top: 2px solid grey;
        margin-left: auto;
       
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
        margin-left: 10px;
        background-color: #ffff;
        width: 400px;
        border-radius: 15px;
    }

    .form-group{
        margin-top: 30px;
        width:400px;
        height: 400px;
        padding-left: 50px;  
    }

    .form-control{
        width:300px;
    }

    
</style>
<body>
    <?= form_open('payment');?>
<div class="col-sm-10">

    <div class="container mt-3 d-flex">
        
        <div class="content">
        
            <h3 style="font-style: italic;"><?= $fname.' '.$mname.' '.$lname.' '.$name_ex?></h3>
            <div class="content d-flex">
                <span class="label">Meter no:</span>  
                <span class="span"><?= $meter?></span>
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
                        <div class="yellow" style="height: 20px; width: 40px; background-color: #FFFF00; border: 1px solid #d3d3d3"></div>
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

<div class="container" style="display:flex;">
    <div class="col-lg-5" style="width: 700px; margin-left: 10%">
        <div class="form-group">
            <table>
                <tr>
                    <th style="padding-left: 20px; padding-right:40px;">Date</th>
                    <th style="padding-left: 20px;">Consumption</th>
                    <th style="padding-left: 40px;">Price/m³</th>
                    <th style="padding-left: 60px;">Amount</th>
                    <th style="padding-left: 60px;">Status</th>
                </tr>
                <?php foreach ($consumption as $row){?>
            <tr>
                <td style=" padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action"><?= $row['month'];?></a>
                </td>

                <td style="padding-left: 50px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action"><?= $row['total_consumption'].' m³';?></a>
                </td>

                <td style="padding-left: 60px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action">₱<?= $row['present_rate'];?></a>
                </td>

                <td style="padding-left: 70px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action">₱<?= $row['Total_Payables'];?></a>
                </td>

                <td style="padding-left: 55px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action"><?= $row['bill_status'];?></a>
                </td>

                <td style="padding-left: 55px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action"><?php $ID = $row['ID'];?><input type="hidden" name="bill_ID" value="<?= $ID;?>"></a>
                </td>
            </tr>
        <?php }?>
            </table>  
        </div>
    </div>
    
    <div class="col-lg-5">
        <div class="form-group" style="padding-left: 50px;">
                <h4><i>Store Credit:</i> <i><span style="color: #0458C0;">₱<?= $total?>.00</span></i></h4>
                <h3 style="padding-top: 30px;"><i>Outstanding Balance:</i></h3>
                
                <div class="form-floating mb-2">
                    <input type="text" name="total_payables" class="form-control" style="border: none; font-style: italic; font-size: 40px; text-align: center; color: #0458C0;" id="floatingInput" value="₱ <?= $total?>.00" readonly>
                </div>
    
                <h3 style="padding-top: 30px;"><i>Payment Tendered:</i></h3>
                
                <div class="form-floating mb-2">
                    <input type="text" name="payment" class="form-control rounded-4" id="floatingInput" placeholder="Payment:" required>
                    <label for="floatingInput">Payment:</label>
                    <?php if($this->session->flashdata('pay_failed')) :?>
        <?= '<p style="color: red; ">'.$this->session->flashdata('pay_failed').'</p>'?>
    <?php endif;?>
                </div>
                <input type="hidden" name="total" value="<?= $total;?>">
                <input type="hidden" name="ID" value="<?= $meter_id;?>">
                <input type="hidden" name="status" value="Paid">
    
                <button type="submit" class="btn btn-primary px-4" style="width: 200px; margin-left: 60px;">Submit</button>
        </div>
    </div>
</div>
    
</body>

   