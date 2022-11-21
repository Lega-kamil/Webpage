
<h1>Piwne Zasoby:</h1>
<style>
    a{
      background-color: black;
      border: black;
      color: white;
      padding: 7px 15px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 15px;
      margin: 7px 5px;
      transition-duration: 0.4s;
      cursor: pointer;
    }
</style>
<?php
$hostname = 'localhost';
$database = 'projekt';
$username = 'root';
$password = ''; 

$conn = mysqli_connect($hostname, $username, $password, $database);

if($id < 0){
    $query = "SELECT * FROM piwa";
    $wynik = $conn->query($query);

    if ($wynik->num_rows > 0) {
        while($row = $wynik->fetch_assoc()) {
            echo "<tr><td>".$row["Firma"]."</td><td>"." ".$row["Nazwa"]." ".$row["Rodzaj"].'</td>
            <a href="index.php?page=1&id='.$row["id"].'">Podglad</a></tr>'.'<br>';
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
}
else
{
    $query = "SELECT * FROM piwa Where id = $id";
    $wynik = $conn->query($query);
    
        if ($wynik->num_rows > 0) {
            while($row = $wynik->fetch_assoc()) {
                echo "<tr><td>".$row["Firma"]."</td><td>"." ".$row["Opis"].$row["Nazwa"]." ".$row["Rodzaj"].'</td>.
                .<br>';
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
}

?>

