<?php
    function skrypt1(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_04");
        if(!$conn){
            echo " nie udalo sie polaczyc z baza";
            return;
        }
        $zapytanie = "SELECT model FROM `produkt` WHERE 1;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<option> $wiersz[0] </option>";
        }
        mysqli_close($conn);
    }
    function skrypt2(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_04");
        if(!$conn){
            echo " nie udalo sie polaczyc z baza";
            return;
        }
        $zapytanie = "SELECT buty.model, buty.nazwa,buty.cena,nazwa_pliku FROM `buty`,produkt WHERE buty.model=produkt.model;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<div class='buty'><img src='$wiersz[3]' alt='but męski'> <h2>$wiersz[1]</h2> <h5>Model: $wiersz[0]</h5> <h4>Cena: $wiersz[2]</h4> </div>";
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
        <form action="zamow.php" method="POST">
        <label for="Model">Model: <select name="Model" id="Model" class="kontrolki"><?php skrypt1()?></select></label>
        <label for="Rozmiar" class="kontrolki">Rozmiar: 
        <select name="Rozmiar" id="Rozmiar" class="kontrolki">
            <option value="40" class="kontrolki">40</option>
            <option value="41" class="kontrolki">41</option>
            <option value="42" class="kontrolki">42</option>
            <option value="43" class="kontrolki">43</option>
        </select></label>
        <label for="Pary">Liczba par: <input type="number" name="Pary" id="Pary" class="kontrolki"></label>
        <button type="submit" class="kontrolki">Zamów</button>
        <?php skrypt2()?>
    </form>
    </main>


    <footer>
        <p>Autor strony: Miłosz Łabędzki</p>
    </footer>
</body>
</html>
