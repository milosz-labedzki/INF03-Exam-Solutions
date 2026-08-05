<?php function skrypt1(){
    $conn = mysqli_connect("localhost","root","","inf03_2024_06_11");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
    }
    $zapytanie = "SELECT rasa FROM `rasy` WHERE 1;";
    $wynik = mysqli_query($conn,$zapytanie);
    while($wiersz=mysqli_fetch_row($wynik)){
        echo "<li> $wiersz[0] </li>";
    }
    mysqli_close($conn);
    }
    

    function skrypt2(){
        $conn = mysqli_connect("localhost","root","","inf03_2024_06_11");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
    }
    $zapytanie = "SELECT DISTINCT data_ur,miot,rasa FROM `swinki`,rasy WHERE swinki.rasy_id=rasy.id AND rasy.id=1;";
    $wynik = mysqli_query($conn,$zapytanie);
    while($wiersz = mysqli_fetch_row($wynik)){
        echo "<h2>Rasa: $wiersz[2]</h2> <p>Data urodzenia: $wiersz[0]</p> <p>Oznaczenie miotu: $wiersz[1]</p>";
    }
    mysqli_close($conn);
    }

    function skrypt3(){
        $conn = mysqli_connect("localhost","root","","inf03_2024_06_11");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
    }
    $zapytanie = "SELECT imie,cena,opis FROM `swinki` WHERE rasy_id =1;";
    $wynik=mysqli_query($conn,$zapytanie);
    while($wiersz=mysqli_fetch_row($wynik)){
        echo "<h3>$wiersz[0] $wiersz[1] zł</h3> <p>$wiersz[2]</p>";
    }
    mysqli_close($conn);
    }
    ?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <section>

    <menu id="lewy_menu">
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </menu>

      

    <main id="lewy_glowny">
        <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
        <?php skrypt2()?>
         <hr>
        <h2>Świnki w tym miocie</h2>
        <?php skrypt3()?>
    </main>


<aside id="prawy">
        <h3> Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php skrypt1()?>
        </ol>
       
    </aside>
</section>

    <footer>
        <p>Stronę wykonał brr brr</p>
    </footer>
</body>
</html>