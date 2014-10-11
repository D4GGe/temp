<head>
	<style type="text/css">
div:hover{
	background-color: #fff;
}
	</style>
}
</head>
<body style="background-color:#000;">
<?php
$dbtype     = "mariadb";
$dbhost     = "localhost";
$dbname     = "home";
$dbuser     = "home";
$dbpass     = "UfMrjYBFjZ3mTx3f";
$conn		= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

$q = $conn->prepare("SELECT * FROM temp");
$q->execute();
$rows = $q->fetchAll();
echo "<div style='vertical-align:bottom;width=100%;height:200px;background-color:#404;'>";
$count = 0;
foreach($rows as $row){
	$count++;
}
foreach($rows as $row){
	echo "<div style='height:".((100-2*$row['temp']))."%;float:left;width:".(100/$count)."%;background-color:black'></div>";
}
echo "</div>";

$q = $conn->prepare("select t1.* FROM (select * FROM light ORDER BY id DESC LIMIT 500) as t1 ORDER BY id");
$q->execute();
$rows = $q->fetchAll();
echo "<div style='width=100%;height:200px;background-color:#490;'>";
$count = 0;
foreach($rows as $row){
	$count++;
}
foreach($rows as $row){
	echo "<div style='height:".(100-$row['light']*0.1)."%;float:left;width:".(100/$count)."%;background-color:black'></div>";
}
echo "</div>";
echo "</table>";

$q = $conn->prepare("SELECT * FROM humidity");
$q->execute();
$rows = $q->fetchAll();
echo "<div style='vertical-align:bottom;width=100%;height:200px;background-color:#044;'>";
$count = 0;
foreach($rows as $row){
	$count++;
}
foreach($rows as $row){
	echo "<div style='height:".(100-$row['humidity'])."%;float:left;width:".(100/$count)."%;background-color:black'></div>";
}
echo "</div>";
echo "</table>";

//function fetchTemp(){
	$q = $conn->prepare("SELECT * FROM temp");
	$q->execute();
	$rows = $q->fetchAll();
	echo "<table>";
	echo "<tr><th>ID</th><th>Temp</th><th>Date</th></tr>";
	foreach($rows as $row){
		echo '<tr><td>'.$row['id'].'</td><td>'.$row['temp'].'</td><td>'.$row['date'].'</td></tr><br/>';
	}
	echo "</table>";
//}

//function fetchLight(){
	$q = $conn->prepare("SELECT * FROM light");
	$q->execute();
	$rows = $q->fetchAll();
	echo "<table>";
	echo "<tr><th>ID</th><th>Light</th><th>Date</th></tr>";
	foreach($rows as $row){
		echo '<tr><td>'.$row['id'].'</td><td>'.$row['light'].'</td><td>'.$row['date'].'</td></tr>';
	}
	echo "</table>";
//}

//function fetchHum(){
	$q = $conn->prepare("SELECT * FROM humidity");
	$q->execute();
	$rows = $q->fetchAll();
	echo "<table>";
	echo "<tr><th>ID</th><th>Humidity</th><th>Date</th></tr>";
	foreach($rows as $row){
		echo '<tr><td>'.$row['id'].'</td><td>'.$row['humidity'].'</td><td>'.$row['date'].'</td></tr>';
	}
	echo "</table>";
//}
?>

</body>