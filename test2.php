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

$temperatures = "[";
foreach($rows as $row){
	$temperatures = $temperatures.'[new Date("'.$row['date'].'"),'.$row['temp'].'],';
}
$temperatures = rtrim($temperatures,",")."]";



?>
<html>
<head>
<script type="text/javascript" src="dygraph-combined.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
<div id="graphdiv" style="width:100%; height:350px"></div>
<script type="text/javascript">
	g = new Dygraph(
		document.getElementById("graphdiv"),
		<?php echo $temperatures?>,
		{
			labels:["Date","Temperature"],
			title: "Temperatur i Rustrummet",
			ylabel: "Temperatur (C)",
			rollPeriod: 14,
			showRoller: true
		}
	);
	
	/*g.ready(function() {
		g.setAnnotations([
		{
			series: "Temperature",
			x: Date.parse("2014-09-28 01:20:40"),
			shortText: "A",
			text: "Stallde in i kylen"
		}
		]);
	});*/
</script>
</body>
</html>

