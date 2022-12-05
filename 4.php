
<?php
$hostname = 'localhost'; // Nazwa hosta
$database = 'projekt'; // Nazwa bazy danych
$username = 'root'; // Nazwa uztytkownika
$password = ''; // Haslo
session_start();

$conn = mysqli_connect($hostname, $username, $password, $database);

if(isset($_SESSION["imie"])){
    echo "Login: " . htmlspecialchars($_SESSION["imie"]) . ". "."<br />";
    echo "Haslo: " . htmlspecialchars($_SESSION["haslo"]) . ". "."<br />";

}else{
    header('Location: index.php?page=3');
}


?>

<form action="./index.php?page=4" method="POST">
    <input type="submit" name="wyloguj" value="Wyloguj!"></a>
</form>

<?php

if(isset($_POST['wyloguj'])){
    session_unset();
    session_destroy();
    header('refresh:0');
}

?>