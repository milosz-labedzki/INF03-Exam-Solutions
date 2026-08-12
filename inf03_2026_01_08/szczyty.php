<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_08");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt3($polaczenie){
        if(isset($_GET['id'])&& $_GET['id']!=""){
        $id_szczytu = $_GET['id'];
        $zapytanie = "SELECT plik,nazwa,wysokosc,pasmo,opis.opis FROM `szczyty` JOIN opis ON opis.szczyty_id = szczyty.id WHERE szczyty_id=$id_szczytu;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
        echo "<img src='$wiersz[0]' alt='szczyt'>";
        echo "<h2>$wiersz[1]</h2>";
        echo "<h3>wysokość: $wiersz[2] metrów n.p.m</h3>";
        echo "<h3>pasmo górskie: $wiersz[3]</h3>";
        echo "<p>$wiersz[4]</p>";
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
        <?php skrypt3($conn)?>
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