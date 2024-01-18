<style>
    .col-sm-10 {
        margin-top: 70px;
        margin-left: 16%; 
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
        background-color: #DFDEDE;
        margin-top: auto;
        padding-top: 10px;
    }
</style>

<div class="col-sm-10">
    <?php if($this->session->flashdata('success')) :?>
        <?= '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>'?>
    <?php endif;?>
        <h4><a class="list-group-item list-group-item-action" href="cAdd_expenses">+Add Expenses</a></h4>
    <hr>
    <table> 
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
            <strong style="text-align: center; padding-left: 630px;">Total Expenses:</strong>
            <strong>₱ <?= $total_expenses;?></strong>
        </div>
    </footer>
</div>


