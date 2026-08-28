<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_07");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($polaczenie){
        $zapytanie = "SELECT nazwa,kraj,temperatura FROM `miejscowosc` JOIN pomiary ON miejscowosc.id= pomiary.id_miejscowosc WHERE id_miesiac=7;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            if($wiersz[2]>30){
                echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td><img src='slonce.png' alt=''></td></tr>";
            }
            else if($wiersz[2]<26){
                echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td><img src='deszcz.png' alt=''></td></tr>";
            }
            else{
            echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td><img src='chmury.png' alt=''></td></tr>";
            }
        }
    }
    function skrypt2($polaczenie){
        if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $zapytanie = "SELECT ROUND(AVG(temperatura),2) FROM `pomiary` WHERE id_miesiac = $id;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
        echo "<h3>$wiersz[0] stopni</h3>";
        }
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pogoda</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="naglowek">
    <header id="pierwszy">
        <img src="slonce.png" alt="Słonecznie">
    </header>


    <header id="drugi">
        <h1>Pogoda w Europie</h1>
    </header>
    </div>

    <main>


    <section id="lewy">
        <h2>Temperatury w lipcu</h2>
        <table>
            <tr>
                <th>Miasto</th>
                <th>Kraj</th>
                <th>Temperatura</th>
                <th>Pogoda</th>
            </tr>
            <?php skrypt1($conn)?>
        </table>
    </section>


    <section id="prawy">
        <h2>Średnie temperatury w roku</h2>
        <a href="index.php?id=1">Styczeń</a>
        <a href="index.php?id=2">Luty</a>
        <a href="index.php?id=3">Marzec</a>
        <a href="index.php?id=4">Kwiecień</a>
        <a href="index.php?id=5">Maj</a>
        <a href="index.php?id=6">Czerwiec</a>
        <a href="index.php?id=7">Lipiec</a>
        <a href="index.php?id=8">Sierpień</a>
        <a href="index.php?id=9">Wrzesień</a>
        <a href="index.php?id=10">Październik</a>
        <a href="index.php?id=11">Listopad</a>
        <a href="index.php?id=12">Grudzień</a>
        <p>Średnia temperatura dla wybranego miesiąca wynosi</p>
        <?php skrypt2($conn)?>
    </section>


    </main>


    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
