<?php
    $conn = mysqli_connect("localhost","root","","inf03_2024_01_06");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return; 
    }
    function skrypt1($conn){
        $zapytanie = "SELECT nazwaPliku,podpis FROM `zdjecia` ORDER BY podpis ASC;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<img src='$wiersz[0]' alt='$wiersz[1]' title='$wiersz[1]'>";
        }
    }
    function skrypt2($conn){
        $zapytanie = "SELECT cel,dataWyjazdu FROM `wycieczki` WHERE dostepna=0;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li> Dnia $wiersz[1] pojechaliśmy do $wiersz[0]</li>";
        }
    }

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>

<main>
    <aside id="lewy">
        <h2>Promocje</h2>
        <table>
            <tr>
                <td>Warszawa</td>
                <td>od 600zł</td>
            </tr>
            <tr>
                <td>Wenecja</td>
                <td>od 1200zł</td>
            </tr>
            <tr>
                <td>Paryż</td>
                <td>od 1200zł</td>
            </tr>
        </table>
    </aside>


    <section id="srodkowy">
        <h2>W tym roku jedziemy do...</h2>
        <?php skrypt1($conn)?>
    </section>


    <aside id="prawy">
        <h2>Kontakt</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 444555666</p>
    </aside>

</main>
    <section id="dane">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php skrypt2($conn)?>
        </ol>
    </section>


    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
