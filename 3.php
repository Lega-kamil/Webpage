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
        <h1>LOGOWANIE</h1>
        <p>LOGIN:<br><input type="text" name="imie" placeholder="LOGIN"/></p>
        <p>HASŁO:<br><input type="password" name="haslo" placeholder="PASSWORD"/></p>
        <input type="submit" name="signIn" />
    </form>
    <br>
    <form action="./index.php?page=3" method="POST">
        <h1>REJESTRACJA</h1>
        <p>LOGIN:<br><input type="text" name="imie" placeholder="LOGIN"/></p>
        <p>HASŁO:<br><input type="password" name="haslo" placeholder="PASSWORD"/></p>
        <p>POTWIERDZ HASŁO:<br><input type="password" name="haslo1" placeholder="PASSWORD"/></p>
        <p>KONTAKT:<br><textarea id="kontakt" name="kontakt" placeholder="email/phone number" style="width:220px ;height:60px"></textarea></p>
        <input type="submit" name="register" />
    </form>


<?php

// rejestracja
$regex = '^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$^';

    if(isset($_POST['register']) && isset($_POST['kontakt']) && isset($_POST['imie']) && isset($_POST['haslo'])){
        $login = ($_POST['imie']);
        $haslo = sha1($_POST['haslo']);
        $kontakt = ($_POST['kontakt']);
        if(!empty($login) && !empty($haslo) && !empty($kontakt) && (preg_match($regex, strval($kontakt)) == 1)){
            $query = "SELECT * FROM user WHERE Login LIKE '" . $_POST['imie'] . "'";
            $result = mysqli_query($conn,$query);
            
            if(mysqli_num_rows($result) > 0){
                echo "Istnieje użytkownik z tym Loginem";
            }else{
                if(($_POST['haslo']) == ($_POST['haslo1'])){
                    $sql = "INSERT INTO `user` (`id`, `Login`, `Haslo`,`kontakt`)
                    VALUES (NULL, '$login', '$haslo','$kontakt')";
                    if($result = mysqli_connect($hostname, $username, $password, $database) -> query($sql)) echo "Dodano nowe konto!";
                }else{
                    echo "Hasła nie są takie same!";
                }
            }
        }
    }


// logowanie
if(isset($_POST['signIn']) && isset($_POST['imie']) && isset($_POST['haslo'])){
    $login = $_POST['imie'];
    $haslo = sha1($_POST['haslo']);
    
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
            echo "Błąd logowania";
        }
    }

    
}
?>