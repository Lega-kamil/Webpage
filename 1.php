
<form action="" method="POST"> 
  <center><h1>Dostępne Piwooo</h1></center>
  <center><p><input type="text" name="search"/></p> </center>
  <center><p><input type="submit" value="Wyszukaj" name="sub"/>
  <section class ="wrap">
  <section class="container">
</form>

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

if(isset($_POST["search"])){
    $nazwa = "nazwa";
    $producent = "producent";
    
    $query = "SELECT * FROM piwa WHERE producent like '".@$_POST['search']."%'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
        $nazwa = $row['nazwa'];
        $id = $row['id'];
      
    
      
        echo "<tr><td>".$row["producent"]."</td><td>"." ".$row["nazwa"]." ".$row["rodzaj"].'</td>
        <a href="index.php?page=1&id='.$row["id"].'">Podglad</a></tr>'.'<br>';
    }
}

else if($id < 0){
    $query = "SELECT * FROM piwa";
    $wynik = $conn->query($query);

    if ($wynik->num_rows > 0) {
        while($row = $wynik->fetch_assoc()) {
            echo "<tr><td>".$row["producent"]."</td><td>"." ".$row["nazwa"]." ".$row["rodzaj"].'</td>
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
                echo "<tr><td> Producent: ".$row["producent"]."</td><td>"."<br> Nazwa: ".$row["nazwa"]." Rodzaj: ".$row["rodzaj"]."<br> Opis: ".$row["opis"].'</td>
                <br>';
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
}

?>

