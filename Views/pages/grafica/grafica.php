<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    </head>
<!--INICIO TABLA SEMESTRAL -->
<div>
<?php
include 'consultagrafica.php'; 
?>
                  <canvas id="myChart" width="200" height="80"></canvas>
                </div>
                <script>
                  const linechart = document.getElementById('myChart').getContext('2d');
                  const myChart = new Chart(linechart, {
                        type: 'line',
                        data: {
                              labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                              datasets: [
                                        {
                                          label: 'Traslados Realizados',
                                          data: [<?php echo $EneroIna.', '.$FebreroIna.', '.$MarzoIna.', '.$AbrilIna.', '.$MayoIna.', '.$JunioIna.', '.$JulioIna.', '.$AgostoIna.', '.$SeptIna.', '.$OctIna.', '.$NovIna.', '.$DicIna?>],
                                          backgroundColor: ['rgba(27, 157, 51)'],
                                          borderColor:['rgb(21, 122, 39)']

                                         
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
<!--FIN TABLA SEMESTRAL -->
</html>