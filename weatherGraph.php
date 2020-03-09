<?php
$servername = "192.168.0.210";
$username = "humChecker";
$password = "raspberry";
$dbname = "projects";

$hum = array();
$temp = array();
$timeS = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM humTemp";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	array_push($hum, $row["humidity"]);
    array_push($temp, $row["temperature"]);
    array_push($timeS, "'".($row["timeStamp"])."'");
    
    //echo "$timeS[0]";
    
	//echo "Temperature: " . $row["temperature"]. "°C - Humidity: " . $row["humidity"]."% <br> <br>";

}
} else {
	echo "0 results";
	}

$conn->close();

echo  'Min Humidity: '.min($hum).'% Max Humidity: '.max($hum).'% ';
echo  'Min Temperature: '.min($temp).'°C Max Termperature: '.max($temp).'°C';

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<meta charset="utf-8">
<title></title>
</head>
<body>

<div id="chart">
</div>
<script>
var options = {
	series: [
	{
		name: "Humidity",
		data: [<?php echo join(", ",$hum) ?>]
	},
	{
		name: "Temperature",
		data: [<?php echo join(", ",$temp) ?>]
	}
],
	chart: {
		height: 350,
		type: 'line',
		dropShadow: {
		enabled: true,
		color: '#000',
		top: 18,
		left: 7,
		blur: 10,
		opacity: 0.2
	},
		toolbar: {
		show: false
	}
	},
		colors: ['#77B6EA', '#545454'],
		dataLabels: {
		enabled: true,
	},
	stroke: {
	curve: 'smooth'
	},
		title: {
			text: 'Humidity & Temperature Readings',
			align: 'left'
		},
		grid: {
			borderColor: '#e7e7e7',
			row: {
			colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
			opacity: 0.5
		},
		},
		markers: {
			size: 1
		},

		xaxis: {
			type: 'datetime',
			categories : [<?php echo join(", ",$timeS) ?>],
			title: {
			text: 'Date'
		}
		},

		yaxis: {
			title: {
			text: 'Temperature'
		},
		min: 5,
		max: 100,
		
		legend: {
			position: 'top',
			horizontalAlign: 'right',
			floating: true,
			offsetY: -25,
			offsetX: -5
		}
	}
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

</script>
</body>
</html>




