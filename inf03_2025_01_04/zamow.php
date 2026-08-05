<?php
    function skrypt3(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_04");
        if(!$conn){
            echo " nie udalo sie polaczyc z baza";
            return;
        }
        $Model = $_POST['Model'];
        $zapytanie = "SELECT buty.nazwa,buty.cena,produkt.kolor,produkt.kod_produktu,produkt.material,produkt.nazwa_pliku
         FROM `buty`,produkt WHERE buty.model=produkt.model AND produkt.model='$Model'";
        $wynik = mysqli_query($conn,$zapytanie);
        $pary=$_POST['Pary'];
        $rozmiar=$_POST['Rozmiar'];
        while($wiersz = mysqli_fetch_row($wynik)){
            $wartosc_calkowita = $wiersz[1] * $pary;
            echo "<img src='$wiersz[5]' alt='but męski'> <h2>$wiersz[0]</h2> <p>cena za $pary par : $wartosc_calkowita zł</p> <p>Szczegóły produktu: $wiersz[2] $wiersz[4]</p> <p>Rozmiar: $rozmiar</p>";
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>


    <main>
        <h2>
            Zamówienie<br>
            <?php skrypt3()?>
            <a href="index.php">Strona główna</a>
        </h2>
    </main>


    <footer>
        <p>Autor strony: brrbrr</p>
    </footer>
</body>
</html>