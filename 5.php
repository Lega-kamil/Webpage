<?php
$hostname = 'localhost'; // Nazwa hosta
$database = 'projekt'; // Nazwa bazy danych
$username = 'root'; // Nazwa uztytkownika
$password = ''; // Haslo

$conn = new mysqli($hostname, $username, $password, $database);
?>
    <form action="./index.php?page=5.php" method="POST">
        <h2>DODAJ PIWO</h2>
        <p>Firma/Browar:<input type="text" name="Firma" placeholder="Np:Bosman"/></p><br>
        <p>Nazwa:<input type="text" name="Nazwa" placeholder="np.Jasne Pszeniczne"/></p><br>
        <p>Rodzaj/Gatunek:<input type="text" name="Rodzaj" placeholder="Jasny Lager"/></p><br>
        <p>Opis(opcjonalny):<textarea id="Opis" name="Opis"></textarea></p>
        <input type="checkbox" name="zapis" value="yes"/>
        <input type="submit" name="wyslij" />
    </form>

    <?php
    if(!isset($_POST['wyslij'])){
        exit(0);
    }

if(($_POST['zapis'])==true){
    $Firma = ($_POST['Firma']);
    $Nazwa = ($_POST['Nazwa']);
    $Rodzaj = ($_POST['Rodzaj']);
    $Opis = ($_POST['Opis']);
    $sql = "INSERT INTO `Piwo` (`id`, `producent`, `rodzaj`, `nazwa`,`Opis`)
        VALUES (NULL, '$Firma', '$Nazwa', '$Rodzaj','$Opis')";
    if($result = $conn -> query($sql)) echo "Dodano nowe Piwo!";
    }
    $conn -> close();
?>