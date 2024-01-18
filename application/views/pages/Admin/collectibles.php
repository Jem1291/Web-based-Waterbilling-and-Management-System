<style>
    body{
        background: #fff;

    }

    h3{
        text-align: left;
        padding-left: 30%;
        padding-top: 10px;
        font-style: italic; 
    }

    .table {
        width: 900px;
        margin: 0 auto;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 10px;
        text-align: center;
    }

    .table thead {
        background-color: #f2f2f2;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    
    .sidebar.active ~ .col-sm-10{
      padding-left: 7%;  
    }

    .container {
        flex: 1;
    }

    .pbtn{
        align: right;
    }

    .sidebar.active ~ .col-sm-10{
        margin-top: 4%;
        width: calc(100% - 225);
        left: 150px;
        transition: var(--tran-04);
    }

    @media print{
        body  * {
            visibility: hidden  ;
        }
        .pbtn *{
            visibility: hidden  ;
        }

        .sidebar *{
          visibility: hidden;
        }
        .print, .print * {
            visibility: visible;
        }
    }
</style>

<div class="col-sm-10">
<button class="btn btn-primary pbtn" onclick="window.print()">Print</button>
    <div class="print" id="print">
    <h3>Total Collectibles of 2023</h3>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Month</th>
                <th>No. of Unpaid Consumers</th>
                <th>Total Collectibles</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($collectibles as $row) : ?>
                <tr>
                    <td><?= $row['MONTH']; ?></td>
                    <td><?= $row['Unpaid']; ?></td>
                    <td>₱ <?= $row['Total_Collectibles']; ?>.00</td>
                    <?php
                        $total += $row['Total_Collectibles'];
                    ?>
                </tr>
            <?php endforeach; ?>
            <tr>
            <td colspan="3 " style="text-align: right; padding-right: 130px;"><strong>Total: ₱ <?= $total; ?>.00</strong></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
</div>  