<?php

$con=mysqli_connect("localhost","root","","sweat_society");
if (!$con){
    echo"connexion échouée!";
}
$req = mysqli_query($con,"SELECT nom_produit as name,sum(nb_prod) as number FROM produit,commande where produit.id_produit=commande.id_p group by nom_produit");

$months = array();
$numbers = array();

while ($data = mysqli_fetch_array($req)) {
    $months[] = $data['name'];
    $numbers[] = $data['number'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Graphique commande</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #myChart {
            height: 400px !important;
            width: 100% !important;
        }
    </style>
</head>
<body>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const labels = <?php echo json_encode($months); ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'commande Dataset',
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                data: <?php echo json_encode($numbers); ?>
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
