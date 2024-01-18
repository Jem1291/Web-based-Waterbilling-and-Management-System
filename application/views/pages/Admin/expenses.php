<style>
    
    .col-sm-10{
        margin-top: 4%;
        position: absolute;
        height: 100%;
        width: calc(100% - 150);
        left: 150px;
        transition: var(--tran-04);

    }
    thead th {
        text-align: center;
    }
    table > thead > tr > th {
        text-align: center;
        width: 200px;
    }
    table > tbody > tr > td {
        text-align: center;
    }
    body {
        background: #fff;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .container {
        flex: 1;
    }
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 50px;
        background-color: #fff;
        margin-top: auto;
        padding-top: 10px;
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

</style>

<div class="col-sm-10">
    <?php if($this->session->flashdata('success')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>'?>
    <?php endif;?>
        <h4><a class="list-group-item list-group-item-action" href="add_expenses">+Add Expenses</a></h4>
    <hr>
    <table class="table table-bordered" style="margin-left: 1%;"> 
    <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>UOM</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($expenses as $row){?>
                <tr>
                    <td style="text-align: left; padding-left: 70px;"><?= $row['date'];?></td>
                    <td><?= $row['Description'];?></td>
                    <td><?= $row['UOM'];?></td>
                    <td><?= $row['qty'];?></td>
                    <td style="text-align: left;padding-left: 70px;">₱ <?= $row['amount'];?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>

    <footer>
        <div class="container">
            <strong style="text-align: center; padding-left: 740px;">Total Expenses:   ₱ <?= $total_expenses;?> </strong>
        </div>
    </footer>
</div>


