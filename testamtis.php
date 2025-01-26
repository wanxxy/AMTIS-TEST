<!--MUHAMMAD IKHWAN BIN CHE ROSS-->
<!--AMTIS-TEST-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMTIS-TEST</title>
</head>

<body>
    <div class="container">
    <form method="POST" action="#">
        <div class="input-container">
            <label for="voltag">Voltage (V)</label>
            <input type="number" step="0.01" id="volatge" name="voltage" required>
        </div>

        <div class="input-container">
            <label for="current">Current (A)</label>
            <input type="number" step="0.01" id="current" name="current" required>
        </div>

        <div class="input-container">
            <label for="rate">Current Rate sen/kWh</label>
            <input type="number" step="0.01" id="rate" name="rate" required>
        </div>

        <button>calculate</button>
    </form>    
    </div>

    <?php
        if (isset($_POST['voltage']) && isset($_POST['current']) && isset($_POST['rate'])) {
            $voltage =$_POST['voltage']; 
            $current =$_POST['current']; 
            $rate =$_POST['rate'];       

            //penngiraan power
            $power = $voltage * $current; 

            // tukarkan power kepada kW
            $powerkw = $power / 1000; 

            
            $rateRM = $rate / 100;

            echo "<div class='container' style='text-align: center;'>";
            echo "<h3>POWER: " . number_format($powerkw,5 ) . " kW</h3>";
            echo "<h3>RATE: RM " . number_format($rateRM, 3) . " per kWh</h3></div>";

            echo "<table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hour</th>
                            <th>Energy (kWh)</th>
                            <th>Total (RM)</th>
                        </tr>
                    </thead>
                    <tbody>";

            
            for ($counter = 1, $hour = 1; $hour <= 24; $hour++, $counter++) {
                // utk dpatkan total energy setiap hour (kWh)
                $energy = $powerkw * $hour; 
                // utk dpatkan total rate setiap hour (RM/kWh)
                $total = $energy * $rateRM; 
                echo "<tr>
                        <td>$counter</td>
                        <td>$hour</td>
                        <td>" . number_format($energy, 5) . "</td>
                        <td>" . number_format($total, 2) . "</td>
                    </tr>";
            }

            echo "</tbody></table>"; 
        }
        ?>
</body>

</html>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    font-family: 'Poppins', sans-serif;
}

.container{
    max-width: 300px;
    margin: 50px auto;
    padding: 40px;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 2);
}

.title{
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 24px;
    color: #333;
    text-align: center;
}

.input-container{
    margin-bottom: 20px;
}

label{
    display: block;
    margin-bottom: 10px;
    font-size: 18px;
    color: #333;
}

input[type="number"]{
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline-color: #00a38d;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    font-size: 18px;
    color: #fff;
    background-color: #00a38d;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition-duration: 0.3s;
}

button:hover {
    background-color:rgb(0, 0, 0);
}

.table-bordered {
  border: 1px solid #dee2e6;
  text-align: center;
  margin: 0 auto;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}

</style>