<?php
$hostname = 'localhost'; // Nazwa hosta
$database = 'projekt'; // Nazwa bazy danych
$username = 'root'; // Nazwa uztytkownika
$password = ''; // Haslo
session_start();

$conn = mysqli_connect($hostname, $username, $password, $database);
if(isset($_SESSION["imie"])){
    header('Location: index.php?page=4');
}
?>



    <form action="./index.php?page=3" method="POST">
        <h2>LOGOWANIE</h2>
        <p>login:<input type="text" name="imie" placeholder="LOGIN"/></p><br>
        <p>haslo:<input type="password" name="haslo" placeholder="PASSWORD"/></p><br>
        <input type="submit" name="signIn" />
    </form>
    <br> <br>
    <form action="./index.php?page=3" method="POST">
        <h2>REJESTRACJA</h2>
        <p>kontakt:<textarea id="kontakt" name="kontakt" placeholder="email/phone number"></textarea></p>
        <p>login:<input type="text" name="imie" placeholder="LOGIN"/></p><br>
        <p>haslo:<input type="password" name="haslo" placeholder="PASSWORD"/></p><br>
        <p>Powtorz haslo:<input type="password" name="haslo1" placeholder="PASSWORD"/></p><br>
        <input type="submit" name="register" />
    </form>


<?php

if(($_POST['haslo']) == ($_POST['haslo1'])){
    return(0);
}else{
    exit(0);
}

// rejestracja
if(isset($_POST['register']) && isset($_POST['kontakt']) && isset($_POST['imie']) && isset($_POST['haslo'])){
    $login = ($_POST['imie']);
    $haslo = sha1($_POST['haslo']);
    $kontakt = ($_POST['kontakt']);
    
    $sql = "INSERT INTO `user` (`id`, `Login`, `Haslo`,`kontakt`)
        VALUES (NULL, '$login', '$haslo','$kontakt')";
    if($result = mysqli_connect($hostname, $username, $password, $database) -> query($sql)) echo "Dodano nowe konto!";
}

// logowanie
if(isset($_POST['signIn']) && isset($_POST['imie']) && isset($_POST['haslo'])){
    $login = $_POST['imie'];
    $haslo = $_POST['haslo'];
    
    $query = "SELECT * FROM `user` WHERE Login = '$login'";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($result)){
        if($row[1] == $login && $row[2] == $haslo){
    
        if(isset($_POST['imie'])){
            $_SESSION["imie"] =($_POST['imie']) ;
            
        }
        
        if(isset($_POST['haslo'])){
            $_SESSION["haslo"] =($_POST['haslo']) ;
            
        }
        header('Location: index.php?page=4');
        }else{
            echo "test";
        }
    }

    
}
?>