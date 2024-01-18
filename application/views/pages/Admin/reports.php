<style>
    body{
        background: #fff;

    }

    h3{
        text-align: left;
        padding-left: 40%;
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
      padding-left: 1%;  
    }

    .container {
        flex: 1;
    }

    .pbtn{
        align: right;
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
    <h3>Annual Report of <?= $year ?></h3>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th>Month</th>
      <th>Consumption</th>
      <th>Revenue</th>
      <th>Expenses</th>
      <th>Income</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $total_income = 0;
      foreach($report as $row){?>
        <tr>
          <td style="text-align: left; padding-left: 60px;"><?= $row['month_name'];?></td>
          <td><?= $row['total_consumption'];?> m³</td>
          <td style="text-align: left; padding-left: 70px">₱ <?= $row['total_revenue'];?>.00</td>
          <td style="text-align: left; padding-left: 60px">₱ <?= $row['total_expenses'];?>.00</td> 
          <?php 
            $income = $row['total_revenue'] - $row['total_expenses'];
            $total_income += $income;
          ?>
          <td style="text-align: left; padding-left: 60px">₱ <?= $income;?>.00</td> 
        </tr>
    <?php }?>
    <tr>
      <td colspan="5" style="text-align:right; padding-right: 50px;"> <strong>Total Income: ₱ <?= $total_income;?>.00</strong></td>
    </tr>
    
  </tbody>
</table>

    </div>
</div>
</div>
