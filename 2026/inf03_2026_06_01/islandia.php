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
    function skrypt3($polaczenie){
        $zapytanie = "SELECT idObiekt,plik,nazwa FROM `obiekty` WHERE panstwo = 'Islandia';";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<a href='obiekty.php?id=$wiersz[0]'><img src='pliki1/$wiersz[1]' alt='$wiersz[2]' title='$wiersz[2]' class='miniatury'></a>";
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

    <h2>Galeria</h2>
    <section><?php skrypt3($conn)?></section>

    </main>

    <footer>
        <hr>
        <p>Autor: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>