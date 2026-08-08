<?php
    $conn=mysqli_connect("localhost","root","","inf03_2026_01_04");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($polaczenie,$blok){
        if($blok=="przedmioty"){
            $zapytanie = "SELECT DISTINCT przedmiot FROM `arkusz`;";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "$wiersz[0] ";
            }
        }
        if($blok=="lata"){
            $zapytanie = "SELECT MIN(rok) , MAX(rok) FROM `arkusz`;";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "$wiersz[0] - $wiersz[1]";
            }
        }
        if($blok=="najlepszy"){
            $zapytanie = "SELECT maturzysta.id,AVG(punkty) AS 'wynik' FROM `wynik`,maturzysta WHERE wynik.maturzysta_id=maturzysta.id GROUP BY maturzysta.id ORDER BY wynik DESC LIMIT 1;";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "$wiersz[1]%";
            }
        }
        if($blok=="najgorszy"){
            $zapytanie = "SELECT maturzysta.id,AVG(punkty) AS 'wynik' FROM `wynik`,maturzysta WHERE wynik.maturzysta_id=maturzysta.id GROUP BY maturzysta.id ORDER BY wynik ASC LIMIT 1;";
            $wynik=mysqli_query($polaczenie,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "$wiersz[1]% ";
            }
        }
    }
    function skrypt3($polaczenie){
        $imie = $_GET['imie'];
        $nazwisko = $_GET['nazwisko'];
        $id = $_GET['id'];
        echo "<h2>$imie $nazwisko</h2>";
        $zapytanie = "SELECT rok,sesja,przedmiot,punkty FROM `arkusz`,wynik WHERE wynik.symbol=arkusz.symbol AND maturzysta_id=$id;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<h3>$wiersz[0] $wiersz[1]</h3> <p>$wiersz[2]: $wiersz[3]</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matura</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>System informacji dla maturzystów</h1>
    </header>

<main>
    <aside>
        <img src="ma.jpg" alt="Matura">
        <img src="tu.jpg" alt="Matura">
        <img src="ra.jpg" alt="Matura">
    </aside>

<div id="ulozenie">
    <section id="pierszy">
        <?php skrypt3($conn)?>
    </section>


    <section id="drugi">
        <div class="blok">
            <h4>Przedmioty</h4>
            <?php skrypt1($conn,"przedmioty")?>
        </div>
        <div class="blok">
            <h4>Lata</h4>
            <?php skrypt1($conn,"lata")?>
        </div>
        <div class="blok">
            <h4>
                Najlepszy wynik
                <?php skrypt1($conn,"najlepszy")?>
            </h4>
        </div>
        <div class="blok">
            <h4>Najgorszy wynik</h4>
            <?php skrypt1($conn,"najgorszy")?>
        </div>
    </section>
</div>
</main>
    <footer>
        <p>Stronę wykonał: Miczek</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>