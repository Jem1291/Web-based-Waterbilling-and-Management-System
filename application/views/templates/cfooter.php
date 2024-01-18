<script>
            const ctx = document.getElementById('myChart');
        var chart_data = <?php echo $chart_data; ?>;

        new Chart(ctx, {
            type: 'line',
            data: {
            labels: chart_data.map(function(x){ return x.month + ' ' + x.year}),
            datasets: [{
                label: 'Annual Consumption',
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
</script>
<script src="<?= base_url(); ?>/js/js/sidebar.js"></script>
</body>
</html>