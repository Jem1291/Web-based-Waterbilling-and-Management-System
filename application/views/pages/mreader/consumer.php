<style>
    .col-sm-10{
        margin-top: 70px;
        margin-left: 16.66666667%; 
    }
    thead th {
        text-align: center;
    }
</style>

<div class="col-sm-10">
    <?php if($this->session->flashdata('add_reading')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('add_reading').'</p>'?>
    <?php endif;?>
    <h3>Consumers:</h3>
    <hr>
    <table> 
    <tr>
        <th style="padding-left: 60px;">Meter no</th>
        <th style="padding-left: 60px;">Fullname</th>
        <th style="padding-left: 100px;">Address</th>
        <th style="padding-left: 60px;">Contact</th>
        <th style="padding-left: 55px;">Status</th>
        <th style="padding-left: 45px;">Tags</th>
    </tr>
    <?php foreach($consumer as $row){?>
        <tr>

            <td style="padding-left: 50px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action" href="<?= base_url('reader/');?><?= $row['ID'] ?> "><?= $row['meter_no'];?></a>
            </td>

            <td style="padding-left: 30px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action" href="<?= base_url('reader/');?><?= $row['ID'] ?> "><?= $row['lname']. ', ' .$row ['fname'].' '.$row['mname'];?></a>
            </td>

            <td style="padding-left: 20px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action" href="<?= base_url('reader/');?><?= $row['ID'] ?> "><?= $row['Address'];?></a>
            </td>

            <td style="padding-left: 40px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action" href="<?= base_url('reader/');?><?= $row['ID'] ?> "><?= $row['Contact_Number'];?></a>
            </td>

            <td style="padding-left: 40px; padding-bottom: 10px;">
                <a class="list-group-item list-group-item-action" href="<?= base_url('reader/');?><?= $row['ID'] ?>">
                    <?php if($row['status']==1){?>
                        <span>Connected</span>
                    <?php }elseif($row['status']==2){?>
                        <span>Disconnected</span>
                    <?php }elseif($row['status']==0){?>
                        <span>Pending</span>
                    <?php }?>    
                </a>
            </td>
            
            <td style="padding-left: 40px;">
                <a class="list-group-item list-group-item-action" href="<?= base_url().'reader/';?><?= $row['ID'] ?> ">
                    <?php if($row['tag']==1){?>
                        <div class="green" style="height: 20px; width: 40px; background-color: green">

                        </div>
                    <?php }elseif($row['tag']==2){?>
                        <div class="yellow" style="height: 20px; width: 40px; background-color: yellow">
                        </div>
                    <?php }elseif($row['tag']==3){?>
                        <div class="red" style="height: 20px; width: 40px; background-color: red"></div>
                    <?php }elseif($row['tag']==0){?>
                        <div class="grey" style="height: 20px; width: 40px; background-color: grey">

                        </div>
                    <?php }?>
                </a>
                <input type="hidden" name="id" value="<?= $row['id']?>">
            </td>
        </tr>
    <?php }?>
    </table>
</div>