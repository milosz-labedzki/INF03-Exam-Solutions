<?php
    $conn = mysqli_connect("localhost","root","","inf03_2024_01_04");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($conn){
        $zapytanie = "SELECT DISTINCT wpis FROM `zadania` WHERE dataZadania <= '2020-07-07' AND wpis != '';";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo " $wiersz[0];";
        }
    }
    function skrypt2($conn){
        $zapytanie = "SELECT dataZadania,wpis FROM `zadania` WHERE miesiac='lipiec';";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<section class='blok_kal'><h6>$wiersz[0]</h6> <p>$wiersz[1]</p></section>";
        }
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <section id="uloz_baner">
        <header id="baner_1">
            <img src="logo1.png" alt="lipiec">
        </header>


        <header id="baner_2">
            <h1>TERMINARZ</h1>
            <p>Najbliższe zadania: <?php skrypt1($conn)?></p>
        </header>

</section>
    <section id="uloz_main">
    <main>
        <?php skrypt2($conn)?>
    </main>

</section>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: brr brr</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>