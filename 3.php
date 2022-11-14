<?php
$hostname = 'localhost'; // Nazwa hosta
$database = 'Login'; // Nazwa bazy danych
$username = 'root'; // Nazwa uztytkownika
$password = ''; // Haslo

$conn = new mysqli($hostname, $username, $password, $database);
?>
    <form action="./3.php" method="POST">
        <h2>LOGOWANIE</h2>
        <p>login:<input type="text" name="imie" placeholder="LOGIN"/></p><br>
        <p>haslo:<input type="password" name="haslo" placeholder="PASSWORD"/></p><br>
        <input type="checkbox" name="zapis" value="yes"/>
        <input type="submit" name="wyslij" />
    </form>
    <br> <br>
    <form action="./3.php" method="POST">
        <h2>REJESTRACJA</h2>
        <p>imie:<input type="text" name="name" placeholder="IMIE"/></p><br>
        <p>nazwisko:<input type="text" name="surname" placeholder="NAZWISKO"/></p><br>
        <p>kontakt:<textarea id="kontakt" name="kontakt"></textarea></p>
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
    $Name = ($_POST['name']);
    $Login = ($_POST['imie']);
    $Haslo = ($_POST['haslo']);
    $Nazwisko = ($_POST['surname']);
    $Kontakt = ($_POST['kontakt']);
    $sql = "INSERT INTO `user` (`id`, `Login`, `Haslo`, `Name`,`Surname`,`Kontakt`, )
        VALUES (NULL, '$Login', '$Haslo', '$Name','$Nazwisko','$Kontakt',)";
    if($result = $conn -> query($sql)) echo "Dodano nowe konto!";
    }
    $conn -> close();
?>