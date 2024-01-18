<div class="col-sm-10">
    <div class="content-container">
        <div class="box">
            <div class="mini-box">
                <div class="circle">
                <i class="bi bi-tags-fill" style="color: #0458C0; font-size: 50px;"></i>
                </div>
                <div class="d-block">
                    <div class="total">
                    <h5>Status :</h5>
                    <?php if($status['status']==1){?>
                            <h2 class="status">Connected</h2>
                        <?php }elseif($status['status']==2){?>
                            <h2>Disconnected</h2>
                        <?php }elseif($status['status']== null){?>
                            <h2>Pending</h2>
                        <?php }?>
                    </div>    
                    <div class="total d-flex">
                        <h5>Tag : </h5>
                            <?php if($status['tag']==1){?>
                                <div class="green" style="height: 20px; width: 40px; background-color: green">
                                </div>
                            <?php }elseif($status['tag']==2){?>
                                <div class="yellow" style="height: 20px; width: 40px; background-color: yellow">
                                </div>
                            <?php }elseif($status['tag']==3){?>
                                <div class="red" style="height: 30px; width: 60px; background-color: red;"></div>
                            <?php }elseif($status['tag']==null){?>
                                <div class="grey" style="height: 20px; width: 40px; background-color: grey">
                                </div>
                            <?php }?>
                        
                    </div>    
                </div>
            </div>
            <div class="mini-box">
                <div class="circle">
                <i class="bi bi-droplet-half" style="color: #0458C0; font-size: 50px;"></i>
                </div>
                <div class="total">
                <h5>Consumption :</h5>
                <h2>                  
                    <?= $con; ?> m³
                </h2>
                </div>
            </div>
            <div class="mini-box">
                <div class="circle">
                <i class="bi bi-cash-stack" style="color: #0458C0; font-size: 50px;"></i>
                </div>
                <div class="total">
                <h5>Outstanding Balance:</h5>
                    <h2>  
                    ₱ <?= $pay; ?>.00                
                    </h2>
            </div>
        </div>
    </div>
</div>

    <div class="content-holder">
        <div class="mychart">
            <canvas id="myChart"></canvas>
        </div>
    </div>

   
</div>