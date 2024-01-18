<style>
    .col-sm-10{
        margin-top: 50px;
        margin-left: 16.66666667%; 
    }

    .col-slm-10{
        margin-top: 10px;
        margin-left: 16.66666667%; 
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

</style>
<div class="col-sm-10">
    <div class="container mt-3 d-flex">
        <div class="content">
            <h3 style="font-style: italic;"><?= $fname.' '.$mname.' '.$lname.' '.$name_ex?></h3>
            <div class="content d-flex">
                <span class="label">Username:</span>  
                <span class="span"><?= $username?></span>
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
    <table>
            <thead>
                <tr>
                    <th style="padding-right: 100px; padding-left: 90px;">Month</th>
                    <th style="padding-right: 100px;">Consumption</th>
                    <th style="padding-right: 100px;">Price</th>
                    <th style="padding-right: 100px;">Amount</th>
                    <th style="padding-right: 100px;">Status</th>
                    <th style="padding-right: 0px;">Tools</th>
                </tr>
            </thead>
        </table>
</div>
