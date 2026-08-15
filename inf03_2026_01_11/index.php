<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_11");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($polaczenie){
        $zapytanie = "SELECT * FROM `aktorzy` ORDER BY nazwisko,imie ASC;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<a href='aktor.php?id=$wiersz[0]&imie=$wiersz[1]'><div id='aktor_index'><img src='img/$wiersz[4]' alt='$wiersz[1] $wiersz[2]' title='$wiersz[1] $wiersz[2]'> <p>$wiersz[1] $wiersz[2]</p></div></a>";
        }
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista aktorów | KinoTEKA</title>
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
        <h1>Najlepsi aktorzy w naszym kinie</h1>
        <div id="aktorzy"><?php skrypt1($conn)?></div>
    </main>


    <footer>
        <p>Autor: <strong>Miłosz Łabędzki</strong></p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>