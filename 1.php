
<h1>Piwne Zasoby:</h1>

<?php
$hostname = 'localhost';
$database = 'projekt';
$username = 'root';
$password = ''; 

$conn = mysqli_connect($hostname, $username, $password, $database);


$query = "SELECT * FROM piwa";
$wynik = $conn->query($query);

if ($wynik->num_rows > 0) {
    while($row = $wynik->fetch_assoc()) {
        echo "<tr><td>".$row["producent"]."</td><td>".$row["rodzaj"]." ".$row["nazwa"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

