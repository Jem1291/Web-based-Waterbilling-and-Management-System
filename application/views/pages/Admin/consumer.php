<style>
    .table-holder{
        padding-left: 1%;
    }
    .table thead th {
        background-color: #f2f2f2;
        text-align: center;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #ebebeb;
    }

    .list-group-item {
        padding: 0.75rem 0.25rem;
        margin-bottom: 0;
        background-color: transparent;
        border: none;
    }

    .list-group-item-action:hover {
        background-color: #f2f2f2;
    }
    .bi-person-fill-add {
        font-size: 30px;
    }
    .bi-person-check {
        font-size: 20px;
    }

    .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
    }

    body{
        background: #fff;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
        z-index: 9999;
    }
    .show-modal {
        display: block;
        transition: opacity 0.5s ease;
    }

    .close {
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
        color: #000;
        opacity: .5;
        text-shadow: 0 1px 0 #fff;
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px 15px;
    }

    .close:hover {
        color: #000;
        opacity: .8;
        text-decoration: none;
    }

    .close:focus {
        color: #000;
        opacity: .8;
        text-decoration: none;
        outline: none;
    }

    .status-label {
        padding: 4px 8px;
        border-radius: 4px;
        cursor: pointer;
    }

    .active {
        background-color: green;
        color: white;
    }

    .inactive {
        background-color: grey;
        color: white;
    }

    .pending {
        background-color: orange;
        color: white;
    }

</style>

<div class="col-sm-10">
<?php if($this->session->flashdata('delete')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('delete').'</p>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('logged_in')) :?>
            <?= '<p class="alert alert-success">'.$this->session->flashdata('logged_in').'</p>'?>
        <?php endif;?>
    <?php if($this->session->flashdata('update_user')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('update_user').'</p>'?>
    <?php endif;?>
    
    <?php if($this->session->flashdata('add_user')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('add_user').'</p>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('archive_user')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('archive_user').'</p>'?>
    <?php endif;?>
    <?php if($this->session->flashdata('add_login')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('add_login').'</p>'?>
    <?php endif;?>
    <?php if($this->session->flashdata('add_meter')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('add_meter').'</p>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('error')) :?>
        <?= '<p class="alert alert-danger">'.$this->session->flashdata('error').'</p>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('success')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('failed')) :?>
        <?= '<p class="alert alert-danger">'.$this->session->flashdata('failed').'</p>'?>
    <?php endif;?>
    <h5 class="d-flex justify-content-between">
  <a class="list-group-item list-group-item-action" href="register" style="font-style: italic; padding-left: 10px;">
    <i class="bi bi-person-fill-add"></i> Register
  </a>
  <a style="display: flex; align-items: center; text-decoration: none;" href="<?php echo site_url('overdue_bills'); ?>">
    <span style="margin-right: 5px;">Refresh</span>
    <i class="bi bi-arrow-clockwise"></i>
  </a>
</h5>

    

    <hr>


    <div class="table-holder" style="height: 440px; overflow-y: scroll;">
    <table class="table table-bordered"> 
        <thead>
            <tr>
                <th>Meter No</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Tags</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($consumer as $row):?>
            <tr>
                <td>
                    <a class="list-group-item list-group-item-action" href="<?= base_url();?><?= $row['ID'] ?> "><i class="bi bi-speedometer2"></i> <?= $row['meter_no'];?></a>
                </td>

                <td>
                    <a class="list-group-item list-group-item-action" href="<?= base_url();?><?= $row['ID'] ?> "><?= $row['lname']. ', ' .$row ['fname'].' '.$row['mname'];?></a>
                </td>

                <td> 
                    <a class="list-group-item list-group-item-action" href="<?= base_url();?><?= $row['ID'] ?> "><?= $row['Address'];?></a>
                </td>

                <td>
                    <a class="list-group-item list-group-item-action" href="<?= base_url();?><?= $row['ID'] ?> "><?= $row['Contact_Number'];?></a>
                </td>

                <td style="width: 160px; text-align: center;">
                    <?php if ($row['status'] != 0) { ?> 
                        <a class="list-group-item list-group-item-action toggle-button" href="<?= base_url('update_meter_stat/').$row['ID']; ?>">   
                            <?php if ($row['status'] == 1) : ?>
                                    <span class="status-label active"><i class="bi bi-check-circle-fill"></i> Connected</span>
                                <?php elseif ($row['status'] == 2) : ?>
                                    <span class="status-label inactive"><i class="bi bi-x-circle"></i> Disconnected</span>  
                                <?php endif; ?>
                        </a>
                    <?php }else{ ?>
                        <a class="list-group-item list-group-item-action toggle-button">
                            <span class="status-label pending"><i class="bi bi-hourglass-split"></i> Pending</span>
                        </a>
                    <?php }?>
                    </td>
                
                <td>
                    <a class="list-group-item list-group-item-action" href="<?= base_url();?><?= $row['ID'] ?> ">
                        <?php if($row['tag']==1){?>
                            <div class="green" style="height: 20px; width: 50px; background-color: green">

                            </div>
                        <?php }elseif($row['tag']==2){?>
                            <div class="yellow" style="height: 20px; width: 50px; background-color: yellow">
                            </div>
                        <?php }elseif($row['tag']==3){?>
                            <div class="red" style="height: 20px; width: 50px; background-color: red"></div>
                        <?php }elseif($row['tag']==0){?>
                            <div class="grey" style="height: 20px; width: 50px; background-color: grey">

                            </div>
                        <?php }?>
                    </a>
                </td>

                <td style="width: 125px;">
                    <?php if($row['status']==0){?>
                        <a href="approve/<?= $row['id']?>" class="btn btn-primary btn-sm" style="width: 50px;"><i class="bi bi-hourglass-split"></i></a>
                    <?php }?>
                    <?php if($row['status']==1){?>
                        <a href="edit/<?= $row['id']?>" class="btn btn-primary btn-sm" style="width: 50px;"><i class="bi bi-pencil-fill"></i></a>
                    <?php }?>

                        <button class="btn btn-danger btn-sm delete" value="<?= $row['ID']?>" style="width: 50px;"><i class="bi bi-archive-fill"></i></button>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    
    </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var toggleButtons = document.getElementsByClassName("toggle-button");
        Array.from(toggleButtons).forEach(function(button) {
            button.addEventListener("click", function() {
                var statusLabel = this.getElementsByClassName("status-label")[0];
                var status = this.getAttribute("data-status");
                statusLabel.classList.toggle("active", status == 1);
                statusLabel.classList.toggle("inactive", status == 2);
                statusLabel.classList.toggle("pending", status == 0);
            });
        });
    });
</script>
