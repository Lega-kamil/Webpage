<?php
$hostname = 'localhost';
$database = 'login';
$username = 'root';
$password = '';

mysqli_connect($hostname, $username, $password, $database);
?>

        <form action="./index.php" method="POST">
            <p>login:<input type="text" name="imie" placeholder="LOGIN"/></p><br>
            <p>haslo:<input type="password" name="haslo" placeholder="PASSWORD"/></p><br>
            <input type="checkbox" name="zapis" value="yes"/>
            <input type="submit" name="wyslij" />
        </form>


<?php
    if(!isset($_POST['wyslij'])){
        exit(0);
    }

if(($_POST['zapis'])==true){
    $Login = ($_POST['imie']);
    $Haslo = ($_POST['haslo']);
    $sql = "INSERT INTO `user` (`id`, `Login`, `Haslo`)
        VALUES (NULL, '$Login', '$Haslo')";
    if($result = mysqli_connect($hostname, $username, $password, $database) -> query($sql)) echo "Dodano nowe konto!";
    }
?>