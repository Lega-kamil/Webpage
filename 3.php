<?php
$hostname = 'localhost';
$database = 'login';
$username = 'root';
$password = '';

$conn = mysqli_connect($hostname, $username, $password, $database);
?>



    <form action="./index.php?page=3" method="POST">
        <h2>LOGOWANIE</h2>
        <p>login:<input type="text" name="imie" placeholder="LOGIN"/></p><br>
        <p>haslo:<input type="password" name="haslo" placeholder="PASSWORD"/></p><br>
        <input type="checkbox" name="zapis" value="yes"/>
        <input type="submit" name="wyslij" />
    </form>
    <br> <br>
    <form action="./index.php?page=3" method="POST">
        <h2>REJESTRACJA</h2>
        <p>kontakt:<textarea id="kontakt" name="kontakt" placeholder="email/phone number"></textarea></p>
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
    $kontakt = ($_POST['kontakt']);
    $sql = "INSERT INTO `user` (`id`, `Login`, `Haslo`,`kontakt`)
        VALUES (NULL, '$Login', '$Haslo')";
    if($result = mysqli_connect($hostname, $username, $password, $database) -> query($sql)) echo "Dodano nowe konto!";
    }
    $conn->close();
?>