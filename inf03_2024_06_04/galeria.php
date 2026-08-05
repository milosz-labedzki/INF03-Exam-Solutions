<?php
    function skrypt1(){
        $conn = mysqli_connect("localhost","root","","inf03_2024_06_04");
        if(!$conn){
            echo "nie udalo sie polaczyc z baza";
            return;
        }
        $zapytanie = "SELECT plik,tytul,polubienia,imie,nazwisko FROM `autorzy`,zdjecia WHERE zdjecia.autorzy_id=autorzy.id ORDER BY nazwisko ASC;";
        $wynik = mysqli_query($conn,$zapytanie);
        
        while($wiersz=mysqli_fetch_row($wynik)){
            if($wiersz[2]>40){
            echo "<section class='blok_gen'><img src='$wiersz[0]' alt='zdjęcie'><h3>$wiersz[1]</h3><p>Autor: $wiersz[3] $wiersz[4]<imie> <nazwisko></p>.<a href='$wiersz[0]' download>Pobierz</a></section>";
        }
        else if($wiersz[2]<=40){
            echo "<section class='blok_gen'><img src='$wiersz[0]' alt='zdjęcie'><h3>$wiersz[1]</h3><p>Autor: $wiersz[3] $wiersz[4]</p>.<br> Wiele osób polubiło ten obraz <a href='$wiersz[0]' download>Pobierz</a></section>";
        }
    }
    mysqli_close($conn);
    }
    function skrypt2(){
        $conn = mysqli_connect("localhost","root","","inf03_2024_06_04");
        if(!$conn){
            echo "nie udalo sie polaczyc z baza";
            return;
        }
        $zapytanie ="SELECT tytul,plik FROM `zdjecia` WHERE polubienia >= 100;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){    
            echo "<img src='$wiersz[1]' alt='$wiersz[0]'>";
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    
        <main>
    <section id="lewy">
        <h2>Tematy zdjęć</h2>
        <ol>
            <li>Zwierzęta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </section>


    <section id="srodek">
        <?php skrypt1()?>
    </section>


    <section id="prawy">
        <h2>Najbardziej lubiane</h2>
        <?php skrypt2()?>
        <b>Zobacz wszystkie nasze zdjęcia</b>
    </section>
</main>
    <footer>
        <h5>Stronę wykonał: brr brr</h5>
    </footer>
</body>
</html>