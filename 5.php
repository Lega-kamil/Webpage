<?php
$hostname = 'localhost'; // Nazwa hosta
$database = 'projekt'; // Nazwa bazy danych
$username = 'root'; // Nazwa uztytkownika
$password = ''; // Haslo

$conn = mysqli_connect($hostname, $username, $password, $database);
?>
    <form action="./index.php?page=5" method="POST">
        <h2>DODAJ PIWO</h2>
        <p>Firma/Browar:<input type="text" name="Firma" placeholder="Np:Bosman"/></p><br>
        <p>Nazwa:<input type="text" name="Nazwa" placeholder="np.Jasne Pszeniczne"/></p><br>
        <p>Rodzaj/Gatunek:<input type="text" name="Rodzaj" placeholder="Jasny Lager"/></p><br>
        <p>Opis(opcjonalny):<textarea id="Opis" name="Opis"></textarea></p>
        <input type="submit" name="wyslij" />
    </form>

    <?php
    
    if(isset($_POST['wyslij']) && isset($_POST['Firma']) && isset($_POST['Nazwa']) && isset($_POST['Rodzaj'])){
        $Firma = ($_POST['Firma']);
        $Nazwa = ($_POST['Nazwa']);
        $Rodzaj = ($_POST['Rodzaj']);
        $Opis = ($_POST['Opis']);
        
        $sql = "INSERT INTO `Piwa` (`id`, `Firma`, `rodzaj`, `nazwa`,`Opis`)
        VALUES (NULL, '$Firma', '$Nazwa', '$Rodzaj','$Opis')";
        if($result = mysqli_connect($hostname, $username, $password, $database) -> query($sql)) echo "Dodano nowe piwo!";
    }
    
?>
