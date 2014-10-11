<?php
switch ($_GET["function"]) {
    case "add_temp":
        add_temp();
        break;
    case "add_light":
        add_light();
        break;
    case "add_humidity":
        add_humidity();
        break;
    default:
    	echo "missing: ". $_GET["function"];
}




function add_humidity(){
$dbtype     = "mariadb";
$dbhost     = "localhost";
$dbname     = "home";
$dbuser     = "home";
$dbpass     = "UfMrjYBFjZ3mTx3f";
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);	
$humidity = $_GET["humidity"];
$sql = "INSERT INTO humidity (humidity) VALUES (:humidity)";
$q = $conn->prepare($sql);
$q->execute(array(':humidity'=>$humidity));
echo $humidity;

}

function add_temp(){
$dbtype     = "mariadb";
$dbhost     = "localhost";
$dbname     = "home";
$dbuser     = "home";
$dbpass     = "UfMrjYBFjZ3mTx3f";
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);	
$temp = $_GET["temp"];
$sql = "INSERT INTO temp (temp) VALUES (:temp)";
$q = $conn->prepare($sql);
$q->execute(array(':temp'=>$temp));
echo $temp;
}
function add_light(){
$dbtype     = "mariadb";
$dbhost     = "localhost";
$dbname     = "home";
$dbuser     = "home";
$dbpass     = "UfMrjYBFjZ3mTx3f";
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);	
$light = $_GET["light"];
$sql = "INSERT INTO light (light) VALUES (:light)";
$q = $conn->prepare($sql);
$q->execute(array(':light'=>$light));
echo $light;	
}
?>