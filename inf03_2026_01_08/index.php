<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_08");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($polaczenie){
        $zapytanie = "SELECT id,nazwa FROM `szczyty` ORDER BY wysokosc DESC;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<a href='szczyty.php?id=$wiersz[0]'><span>$wiersz[1]</span></a>";
        }
    }
    function skrypt2($polaczenie){
        $zapytanie ="SELECT plik,nazwa FROM `szczyty` LIMIT 10;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<img src='$wiersz[0]' alt='$wiersz[1]' class='miniatury'>";
        }
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korona gór polskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="naglowek">
    <header id="naglowek_pierwszy">
        <img src="logo.png" alt="Logo">
    </header>


    <header id="naglowek_drugi">
        <h1>Korona Gór Polskich</h1>
    </header>
    </div>


    <main>
        <?php skrypt1($conn)?>
    </main>


    <section>
        <?php skrypt2($conn)?>
    </section>

    <div id="stopka">
    <footer id="stopka_pierwsza">
        <h3>Kontakt</h3>
        <ul>
            <li>Zadzwoń do nas: 111 222 333</li>
            <li><a href="korona@gory.pl">Napisz do nas</a></li>
        </ul>
    </footer>


    <footer id="stopka_druga">
        <h3>&copy; Wykonane przez: Mizcek</h3>
    </footer>
    </div>
    <?php mysqli_close($conn)?>
</body>
</html>