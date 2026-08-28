<?php 
function skrypt1(){
    $conn = mysqli_connect("localhost","root","","inf03_2024_06_05");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    $zapytanie = "SELECT model,rocznik,przebieg,paliwo,cena,zdjecie FROM `samochody` WHERE id=10;";
    $wynik = mysqli_query($conn,$zapytanie);
    while($wiersz=mysqli_fetch_row($wynik)){
        echo "<img src='$wiersz[5]' alt='oferta dnia' id='obraz_blok1'> <h4>Oferta dnia: Toyota $wiersz[0]</h4> <p>Rocznik: $wiersz[1], przebieg: $wiersz[2], rodzaj paliwa: $wiersz[3]</p> <h4>Cena: $wiersz[4]</h4>";
    }
    mysqli_close($conn);
}
function skrypt2(){
    $conn = mysqli_connect("localhost","root","","inf03_2024_06_05");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    $zapytanie = "SELECT nazwa,model,rocznik,cena,zdjecie FROM `marki`,samochody WHERE samochody.marki_id=marki.id AND wyrozniony =1 LIMIT 4;";
    $wynik = mysqli_query($conn,$zapytanie);
    while($wiersz=mysqli_fetch_row($wynik)){
        echo "<section id='blok_generowany'><img src='$wiersz[4]' alt='model'><h4>$wiersz[0] $wiersz[1]</h4><p>Rocznik: $wiersz[2]</p><h4>Cena: $wiersz[3]</h4></section>";
    }

    mysqli_close($conn);
}
    function skrypt3(){
    $conn = mysqli_connect("localhost","root","","inf03_2024_06_05");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    $zapytanie="SELECT nazwa FROM `marki` WHERE 1;";
    $wynik = mysqli_query($conn,$zapytanie);
    while($wiersz=mysqli_fetch_row($wynik)){
        echo "<option> $wiersz[0] </option>";
    }

    mysqli_close($conn);
}
function skrypt4(){
    $conn = mysqli_connect("localhost","root","","inf03_2024_06_05");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    if(isset($_POST['nazwa']) && $_POST['nazwa']!=""){
        $nazwa = $_POST['nazwa'];
        $zapytanie = "SELECT model,cena,zdjecie,nazwa FROM `marki`,samochody WHERE samochody.marki_id=marki.id AND nazwa='$nazwa';";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<section id='blok_generowany'> <img src='$wiersz[2]' alt='model'> <h4>$wiersz[0] $wiersz[3]</h4><h4>Cena: $wiersz[1]</h4></section>";
        }
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>

    <main id="pierwszy">
        <?php skrypt1()?>
    </main>


    <main id="drugi">
        <h2>Oferty Wyróżnione</h2>
        <?php skrypt2()?>
    </main>


    <main id="trzeci">
        <h2>Wybierz markę</h2>
        <form action="KupAuto.php" method="POST">
            <select name="nazwa">
                <?php skrypt3()?>
            </select>
            <button type="submit">Wyszukaj</button>
        </form>
        <section id="czyszczenie">
        <?php skrypt4()?>
        </section>
    </main>


    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>
