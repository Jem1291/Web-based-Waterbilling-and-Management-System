<style>

    body{
    background-color: #fff;
    }
    .my-hr {
        width: 100%;
        border: 2px solid grey;
       
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
    .box-container{
    display: flex; 
    height: 100px;
    }

    table thead tr th{
        text-align: center;
    }

    table tbody tr td{
        text-align: center;
    }
    

</style>
<div class="col-sm-10" style="background: #ffff; height: 100px; border-radius: 10px; ">
    <div class="box-container mt-3 d-flex" style="padding-left: 50px;">
        <div class="content" style="">
            <h3 style="font-style: italic;"><?= $fname.' '.$mname.' '.$lname.' '.$name_ex?></h3>
            <div class="content d-flex">
                <span class="label">Meter no:</span>
                <span class="span"><?= $meterno;?></span>  
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
    <hr class="my-hr">
    <div class="table">

    <table class="table table-borderless">
    <thead>
        <tr>
            <th>Date</th>
            <th>Consumption</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Tools</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($consumption as $row){?>
        <tr>
            <td><a class="list-group-item list-group-item-action"><?= $row['month'].' '.$row['year'];?></a></td>
            <td><a class="list-group-item list-group-item-action"><?= $row['total_consumption'].' m³';?></a></td>
            <td><a class="list-group-item list-group-item-action">₱ <?= $row['present_rate'];?></a></td>
            <td><a class="list-group-item list-group-item-action">₱ <?= $row['Total_Payables'];?></a></td>
            <td><a class="list-group-item list-group-item-action"><?= $row['bill_status'];?></a></td>
            <td><a href="bill/<?= $row['tblconsumption_ID']?>" class="btn btn-primary btn-sm" style="width: 70px;">View</a></td>
        </tr>
        <?php }?>
    </tbody>
</table>
   
    </div>
</div>