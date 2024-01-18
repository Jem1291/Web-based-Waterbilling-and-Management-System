<style>
    body{
        background: #ffff;
    }

    .my-hr {
        width: 100%;
        border-top: 2px solid grey;
        margin-left: auto;
       
    }
    .labels{
        font-size: 20px;
        font-weight: bolder;
    }
    .span{
        font-size: 20px;  
        padding-left: 5px;
        font-style: italic;

    }
    
    .modal{
        display: none;
    }

    .modal.show{
        display: block;
    }

    .modal.close{
        display: none;
    }

</style>
<div class="col-sm-10">
    <div class=" mt-3 d-flex">
        <div class="content" style="width: 320px; margin-left: 40px;">
            <h3 style="font-style: italic;"><i class="bi bi-person-check"></i> <?= $fname.' '.$mname.' '.$lname.' '.$name_ex?></h3>
            <div class="content d-flex">
                <span class="labels"><i class="bi bi-speedometer2"></i> Meter no:</span>
                <span class="span"><?= $meter;?></span>  
            </div>
        </div>
        <div class="content" style="padding-top: 9px; padding-left: 20px;">
            <div class="content d-flex">
                <span class="labels">Address:</span> 
                <span class="span"><?= $purok.', '.$baranggay?></span>
            </div> 
            <div class="content d-flex">
            <span class="labels">Contact no:</span>
            <span class="span"><?= $contact?></span>
            </div> 
        </div>
        <div class="content d-block" style="padding-top: 9px; padding-left: 50px;">
            <div class="content d-flex">
                <span class="labels">Status:</span>
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
        <div class="content d-block" style="padding-top: 9px; padding-left: 50px;">
        <?php if($status != 0){?>
            <div class="content d-flex">
                <a href="add_meter/<?= $ID;?>" class="btn btn-primary btn-sm" style="width: 100px;">Add Meter</a>
            </div>
        <?php }?> 
        </div>
    </div>
    <hr class="my-hr">
    <table>
        <thead>
            <tr>
                <th style="padding-right: 40px; padding-left: 100px;padding-bottom:20px;">Date</th>
                <th style="padding-right: 100px; padding-left: 40px;padding-bottom:20px;">Consumption</th>
                <th style="padding-right: 100px;padding-bottom:20px;">Price</th>
                <th style="padding-right: 100px;padding-bottom:20px;">Amount</th>
                <th style="padding-right: 80px;padding-bottom:20px;">Status</th>
                <th style="padding-left: 20px;padding-bottom:20px;">Tools</th>
            </tr>
        </thead>    
        <?php foreach ($consumption as $row){?>
            <tr>
                <td style="padding-left: 70px; padding-bottom: 10px; text-align: center;    ">
                <a class="list-group-item list-group-item-action"><?= $row['month'].' '.$row['year'];?></a>
                </td>

                <td style="padding-left: 70px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action"><?= $row['total_consumption'].' m³';?></a>
                </td>

                <td style="padding-left: 10px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action">₱ <?= $row['present_rate'];?></a>
                </td>

                <td style="padding-left: 20px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action">₱ <?= $row['Total_Payables'];?></a>
                </td>

                <td style="padding-right: 70px; padding-bottom: 10px; text-align:center;">
                <a class="list-group-item list-group-item-action"><?= $row['bill_status'];?></a>
                </td>

                <td style="padding-left: 5px; padding-bottom: 10px;">
                    <a href="bill/<?= $row['ID']?>" class="btn btn-primary btn-sm bill" style="width: 65px;"><i class="bi bi-archive-fill"></i></a>
                </td>
            </tr>
        <?php }?>

    </table>
</div>