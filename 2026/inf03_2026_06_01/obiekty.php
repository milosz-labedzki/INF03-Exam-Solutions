<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_06_01") or die("nie udalo sie polaczyc z baza");
    function skrypt1($polaczenie){
        $zapytanie = "SELECT nazwa FROM `obiekty` WHERE panstwo = 'Islandia' AND idRodzaj = 10;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz = mysqli_fetch_array($wynik)){
            echo "<li> $wiersz[nazwa] </li>";
        }
    }
    function skrypt2($polaczenie){
        $zapytanie = "SELECT nazwa FROM `obiekty` WHERE panstwo = 'Islandia' AND idRodzaj = 14;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz = mysqli_fetch_array($wynik)){
            echo "<li> $wiersz[nazwa] </li>";
        }
    }
    function skrypt4($polaczenie){
        if(isset($_GET['id']) && $_GET['id'] != null){
        $idObiekt = $_GET['id'];
        $zapytanie = "SELECT plik,nazwa,nazwaCechy,wartoscCechy,opis,rodzaj FROM `obiekty` JOIN rodzaje ON rodzaje.idRodzaj = obiekty.idRodzaj WHERE idObiekt = $idObiekt;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
        echo "<img src='pliki1/$wiersz[0]' alt='$wiersz[1]'> <h2>$wiersz[1]</h2> <h3>$wiersz[5]</h3> <p>$wiersz[2]: $wiersz[3]</p> <p>$wiersz[4]</p>";
        }
        

    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Islandia</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><a href="islandia.php">Zwiedzaj Islandię</a></h1>
    </header>


    <aside>
        <h3>Do zwiedzania</h3>
        <ul>    
            <li>Wodospady: <ol><?php skrypt1($conn)?></ol></li>
            <li>Siedliska zwierząt: <ol><?php skrypt2($conn)?></ol></li>
        </ul>
    </aside>


    <main>

    <h2>Opis miejsca</h2>
    <section><?php skrypt4($conn)?></section>

    </main>

    <footer>
        <hr>
        <p>Autor: Miłosz Łabędzki</p>
    </footer>
        <?php mysqli_close($conn)?>
</body>
</html>