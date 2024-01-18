<style>
    body{
        background: #fff;
    }

    .table-holder{
        padding-left: 1%;
        height: 500px; 
        width: 1138px; 
        overflow-y: scroll;
    }

    .table {
        margin-bottom: 0;
        width: 1120px;
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

    .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
    }
    .bi-person-fill-add {
        font-size: 30px;
        padding-left: 10px;
    }

</style>

<div class="col-sm-10">
    <?php if($this->session->flashdata('update_user')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('update_user').'</p>'?>
    <?php endif;?>
    <?php if($this->session->flashdata('add_user')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('add_user').'</p>'?>
    <?php endif;?>
    <?php if($this->session->flashdata('success')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>'?>
    <?php endif;?>

    <?php if($this->session->flashdata('failed')) :?>
        <?= '<p class="alert alert-danger">'.$this->session->flashdata('failed').'</p>'?>
    <?php endif;?>
    <h5>
        <a class="list-group-item list-group-item-action" href="add_employee"><i class="bi bi-person-fill-add"></i> Add Employee</a>
    </h5>
    <hr>

    <div class="table-holder">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Username</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $row) : ?>
                <tr>
                    <td>
                        <a class="list-group-item list-group-item-action"><?= $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname']; ?></a>
                    </td>
                    <td style="width: 10px;">
                        <a class="list-group-item list-group-item-action"><?= $row['username']; ?></a>
                    </td>
                    <td style="width: 280px;">
                        <a class="list-group-item list-group-item-action"><?= $row['Purok'] . ', ' . $row['Baranggay_Name']; ?></a>
                    </td>
                    <td>
                        <a class="list-group-item list-group-item-action"><?= $row['Contact_Number']; ?></a>
                    </td>
                    <td>
                        <a class="list-group-item list-group-item-action"><?= $row['UserType']; ?></a>
                    </td>
                    <td style="width: 120px; text-align: center;">
                    <?php if ($row['status'] != 0) { ?> 
                        <a class="list-group-item list-group-item-action toggle-button" href="<?= base_url('update_status/').$row['login_info_ID']; ?>">   
                            <?php if ($row['status'] == 1) : ?>
                                    <span class="status-label active"><i class="bi bi-check-circle-fill"></i> Active</span>
                                <?php elseif ($row['status'] == 2) : ?>
                                    <span class="status-label inactive"><i class="bi bi-x-circle"></i> Inactive</span>  
                                <?php endif; ?>
                        </a>
                    <?php }else{ ?>
                        <a class="list-group-item list-group-item-action toggle-button">
                            <span class="status-label pending"><i class="bi bi-hourglass-split"></i> Pending</span>
                        </a>
                    <?php }?>
                    </td>

                    <td style="width: 125px;">
                        <a href="edit_user/<?= $row['login_info_ID'] ?>" class="btn btn-primary btn-sm" style="width: 50px;"><i class="bi bi-pencil-fill"></i></a>
                        <a href="user_delete/<?= $row['login_info_ID'] ?>" class="btn btn-danger btn-sm" style="width: 50px;"><i class="bi bi-archive-fill"></i></a>

            </td>
        </tr>
    </tbody>
    <?php endforeach?>
</table>

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