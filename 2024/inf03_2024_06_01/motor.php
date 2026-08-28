<?php
    $conn = mysqli_connect("localhost","root","","inf03_2024_06_01");
    if(!$conn){
        echo "nie udalo sie polaczy z baza";
        return;
    }
    function skrypt1($conn){
        $zapytanie = "SELECT nazwa,opis,poczatek,zrodlo FROM `zdjecia`,wycieczki WHERE zdjecia.id=wycieczki.zdjecia_id;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<dt> $wiersz[0], rozpoczyna się w $wiersz[2] <a href='$wiersz[3]'>Zobacz zdjęcie</a></dt> <dd>$wiersz[1]</dd>";
        }
    }
    function skrypt2($conn){
        $zapytanie = "SELECT COUNT(*) FROM wycieczki;";
        $wynik = mysqli_query($conn,$zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
        echo "$wiersz[0]";
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl" id="motor_zdj">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>

    <section id="ulozenie">
    <aside id="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php skrypt1($conn)?>
        </dl>
    </aside>

    <section id="prawa_kolumna">
    <aside id="prawy_1">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </aside>


    <aside id="prawy_2">
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek: <?php skrypt2($conn)?></p>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </aside>
    </section>
</section>
    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
