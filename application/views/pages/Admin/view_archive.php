<style>
    body{
        background: #fff;
    }
    thead th {
        text-align: center;
    }

    h3{
        padding-left: 20px;
        font-style: italic;
    }
</style>

<div class="col-sm-10">
    <?php if($this->session->flashdata('delete')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('delete').'</p>'?>
    <?php endif;?>
    <h3><?= $title?></h3>
    <hr>
    <table class="table table-borderless" style="text-align: center"> 
    <tr>
        <th>Fullname</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
    <?php foreach($archive as $row){?>
        <tr>
            <td>
                <a class="list-group-item list-group-item-action"><?= $row['lname']. ', ' .$row ['fname'].' '.$row['mname'];?></a>
            </td>

            <td>
                <a class="list-group-item list-group-item-action"><?= $row['Purok'].', '. $row['Baranggay_Name'];?></a>
            </td>

            <td>
                <a class="list-group-item list-group-item-action"><?= $row['Contact_Number'];?></a>
            </td>

            <td>
                <a class="list-group-item list-group-item-action"><?= $row['username'];?></a>
            </td>

            <td>
                    <a href="user_delete/<?= $row['id']?>" class="btn btn-danger btn-sm" style="width: 70px;">Delete</a>
            </td>
        </tr>
    <?php }?>    
    </table>
</div>