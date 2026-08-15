<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_11");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt2($polaczenie){
        if(isset($_GET['id'])&&$_GET['id']!=""){
            $id = $_GET['id'];
            $zapytanie = "SELECT `imie`,`nazwisko`,`plik_awatara` FROM `aktorzy` WHERE `id_aktora` =$id;";
            $wynik = mysqli_query($polaczenie,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "<div id='aktor_aktor'> <img src='img/$wiersz[2]' alt='$wiersz[0]' title='$wiersz[1]'> <h1> $wiersz[0] $wiersz[1]</h1></div>";
            }
        }
    }
    function skrypt3($polaczenie){
        if(isset($_GET['id'])&&$_GET['id']!="" && isset($_GET['imie'])&&$_GET['imie']!=""){
            $id = $_GET['id'];
            $imie = $_GET['imie'];
            $zapytanie = "SELECT filmy.`id_filmu`,`tytul`,`rok_produkcji` FROM `filmy` JOIN filmy_aktorzy ON filmy_aktorzy.id_filmu=filmy.id_filmu WHERE filmy_aktorzy.id_aktora=$id;";
            $wynik = mysqli_query($polaczenie,$zapytanie);
            $liczba_obsad= mysqli_num_rows($wynik);
            if($liczba_obsad==0){
                echo "$imie nie znajduje się na listach obsady znanych nam produkcji.";
            }
            else{
                echo "$imie znajduje się na listach obsady $liczba_obsad znanych nam produkcji";
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacje o aktorze | KinoTEKA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="naglowek">
    <header id="pierwszy">
        <h2><a href="index.php">KinoTEKA</a></h2>
    </header>


    <header id="drugi">
        <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
    </header>
    </div>


    <main>
        <div id="aktorzy"><?php skrypt2($conn)?></div>
        <?php skrypt3($conn)?>
    </main>


    <footer>
        <p>Autor: <strong>Miłosz Łabędzki</strong></p>
    </footer>
        <?php mysqli_close($conn)?>
</body>
</html>