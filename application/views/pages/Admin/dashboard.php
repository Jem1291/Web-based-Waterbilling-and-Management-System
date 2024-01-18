<style>
    body{
        background-color: #E5E5E5;
    }

    .container{
        display: flex;
        height: 630px;

    }
    .content-container{
        flex: 3;
        order: 2;
    }

    .box{
        background-color: #E5E5E5;
        border-radius: 10px;
        display: flex;
        padding: 10px;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .box > div{
        color: #ffff;
        font-size: 20px;
        width: 200px;
        max-width: 400px;
        height: 150px;
        max-height: 150px;
        flex-basis: 30%;
        margin-bottom: .5rem;
        padding: 15px;
        
        
    }

    .mini-box{
        font-style: italic;
        background-color: #ffff;
        font-weight: bolder;
        display: flex;
        border-radius: 10px;
        box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.50);
        -webkit-box-shadow: 5px 5px 10px 0px (0,0,0,0.50);
        -moz-box-shadow:5px 5px 10px 0px rgba(0,0,0,0.50);

    }
    .total{
        font-style: italic;
        background-color: #ffff;
        text-align: right;
        margin-right: 10px;
        padding-left: 30px;
    }

    h5{
        color:black;
        text-align: left;
    }
    h2{
        color: #0458C0;
        font-size: 50px;
        padding-left: 40px;
    }

    .chart{
        display: flex;
        flex-wrap: wrap; 
    }

    .mychart{
        background-color: #ffff;
        border-radius: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        width: 1000px;
        max-width: 760px;
        height: 450px;
        max-height: 380px;
        flex-basis: 100%;
        box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.50);
        -webkit-box-shadow: 5px 5px 10px 10px (0,0,0,0.50);
        -moz-box-shadow:5px 5px 10px 0px rgba(0,0,0,0.50);
    }

    .circle{
        background-color: rgba(4,88,192,0.50);
        height: 70px;
        width: 70px;
        border-radius: 50px;
        display: 1;
        margin-top:20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .circle i {
        font-size: 30px;
    }


    .content-holder{
        display:flex;
        flex-wrap: wrap;
        padding-left:10px;
    }
    .list{
        padding: 10px;
        background-color: #fff;
        border-radius: 10px;
        width: 320px;
        max-width: 320px;
        height: 380px;
        max-height: 380px;
        margin-left:20px;
        box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.50);
        -webkit-box-shadow: 5px 5px 10px 10px (0,0,0,0.50);
        -moz-box-shadow:5px 5px 10px 0px rgba(0,0,0,0.50);
    }

    table{
        width: 305px;
        margin: 0px;
        padding:0px;
        border-spacing: 0;
        border-collapse: collapse;
    }
    
    table thead > tr > th{
        border-spacing: 0;
        border-collapse: collapse;
        padding-bottom: 5px;
        padding-left: 10px;
        font-size: 15px;
        border-top: 1px solid;
        border-bottom: 1px solid;
        text-align: center;
    }

    table tbody > tr > td{
        padding-left: 10px;
        text-align: center;
    }


</style>

<div class="col-sm-10">
    <div class="content-container">
        <div class="box">
            <div class="mini-box">
                <div class="circle">
                <i class="bi bi-people-fill" style="color: #0458C0; font-size: 50px;"></i>
                </div>
                <div class="total">
                <h5>Consumers :</h5>
                <h2><?= $total;?></h2>
                </div>    
            </div>
            <div class="mini-box">
                <div class="circle">
                <i class="bi bi-hourglass-split" style="color: #0458C0; font-size: 50px;"></i>
                </div>
                <div class="total">
                <h5>Pending :</h5>
                <h2><?= $connected;?></h2>
                </div>
            </div>
            <div class="mini-box">
                <div class="circle">
                <i class="bi bi-tags-fill" style="color: #0458C0; font-size: 50px;"></i>
                </div>
                <h5>Tags :</h5>
                <div class="total">
                <div class="chart">
                    <canvas id="doughnutChart" width="120" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="content-holder">
    <div class="mychart">
        <canvas id="myChart"></canvas>
    </div>
    

        <div class="list">
            <h5>Daily Transactions:</h5>
            <table>
                <thead>
                    <tr>
                        <th>Meter No</th>
                        <th>Name</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transaction as $row){?>

                    <tr>
                        <td>
                            <a class="list-group-item list-group-item-action" href="#"><?= $row['meter_no'];?></a>
                        </td>
                        <td>
                            <a class="list-group-item list-group-item-action" href="#"><?= $row['lname']. ', ' .$row ['fname'].' '.$row['mname'];?></a>
                        </td>
                        <td>
                            <a class="list-group-item list-group-item-action" href="#">₱ <?= $row['Payment'];?></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
        </div>
    </div>

   
</div>

<script>    
        const ctx = document.getElementById('myChart');
        var chart_data = <?php echo $chart_data; ?>;

        new Chart(ctx, {
            type: 'line',
            data: {
            labels: chart_data.map(function(x){ return x.month + ' ' + x.year}),
            datasets: [{
                label: 'Annual Revenue',
                data: chart_data.map(function(x){ return x.total_data }),
                backgroundColor: [
						      'rgba(4, 88, 192, 1)',
						    ],
						     borderColor: [
						      'rgb(4, 88, 192)'					    
						    ],
			        borderWidth: 3,
			        tension: 0.5,
                borderWidth: 3
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });

        var ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');

        var tagCountsJson = <?php echo $tag_counts_json; ?>;
        var tagCountsData = [];
        var tagCountsLabels = [];
        var tagCountsColors = [];

        for (var i = 0; i < tagCountsJson.length; i++) {
            tagCountsData.push(tagCountsJson[i].count);
                    
            if (tagCountsJson[i].tag == '3') {
                tagCountsLabels.push('Red');
                tagCountsColors.push('#FF0000');
            } else if (tagCountsJson[i].tag == '2') {
                tagCountsLabels.push('Yellow');
                tagCountsColors.push('#EAF200');
            } else if (tagCountsJson[i].tag == '1') {
                tagCountsLabels.push('Green');
                tagCountsColors.push('#24B41F');
            } else if (tagCountsJson[i].tag == '0') {
                tagCountsLabels.push('Grey');
                tagCountsColors.push('#F2F2F2');
            }
        }

        var doughnutChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                // labels: tagCountsLabels,
                datasets: [{
                    label: 'tag',
                    data: tagCountsData,
                    backgroundColor: tagCountsColors,
                    borderColor: tagCountsColors,
                    borderWidth: 1
                }]
            },
            options: {
                cutoutPercentage: 50,
                animation: {
                    animateScale: true
                }
            }
        });

    </script>