<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_10");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza danych";
        return;
    }
    $id =7;
    if(isset($_GET['id'])&&$_GET['id']!=""){
        $id = $_GET['id'];
    }
    function skrypt1($polaczenie,$identyfikator){
        $zapytanie = "SELECT nazwa,rodzaj FROM `potrawy` JOIN rodzaje ON potrawy.idRodzaje=rodzaje.idRodzaje WHERE idPotrawy =$identyfikator;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
        echo "$wiersz[1]";
    }
    function skrypt2($polaczenie,$identyfikator){
        $zapytanie = "SELECT nazwa,trudnosc,kalorie FROM `potrawy` WHERE idPotrawy =$identyfikator;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
        echo "<h2>$wiersz[0]</h2>";
        if($wiersz[1]==1){
        echo "<p> Trudność: łatwe, Kalorie: $wiersz[2]</p>";
        }
        else if($wiersz[1]==2){
        echo "<p> Trudność: średnie, Kalorie: $wiersz[2]</p>";
        }
        else if($wiersz[1]==3){
        echo "<p> Trudność: trudne, Kalorie: $wiersz[2]</p>";
        }
    }
    function skrypt3($polaczenie,$identyfikator){
        $zapytanie = "SELECT nazwa,alergen FROM `potrawy` JOIN lista_alergenow ON lista_alergenow.idPotrawy=potrawy.idPotrawy JOIN alergeny ON lista_alergenow.idAlergeny=alergeny.idAlergeny WHERE potrawy.idPotrawy =$identyfikator;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "$wiersz[1] ";
        }
    }
    function skrypt4($polaczenie,$identyfikator,$miejsce){
        $zapytanie = "SELECT przepis,plik FROM `potrawy` WHERE idPotrawy = $identyfikator;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
        if($miejsce=="skrypt"){
            echo "$wiersz[0]";
        }
        if($miejsce=="zdjecie"){
            echo "$wiersz[1]";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog kulinarny</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <aside>
        <a href="przepisy.php?id=1">Sernik</a><br>
        <a href="przepisy.php?id=2">Sałatka</a><br>
        <a href="przepisy.php?id=3">Pankejki</a><br>
        <a href="przepisy.php?id=4">Nugetsy</a><br>
        <a href="przepisy.php?id=5">Łosoś</a><br>
        <a href="przepisy.php?id=6">Kociołek</a><br>
        <a href="przepisy.php?id=7">Jagnięcina</a><br>
        <a href="przepisy.php?id=8">Hamburgery</a><br>
        <a href="przepisy.php?id=9">Eklerki</a><br>
        <a href="przepisy.php?id=10">Churros</a>
        <p>Autor: Miłosz Łabędzki</p>
    </aside>


    <main>
        <h1><?php skrypt1($conn,$id)?></h1>
        <?php skrypt2($conn,$id)?>
        <img src="separator.png" alt="przepis">
        <p>Alergeny: <?php skrypt3($conn,$id)?></p>
        <h2>Składniki</h2>
        <ul>
            <li>Lorem 1 kg</li>
            <li>Ipsum 2 szt.</li>
            <li>Dolor 200 g</li>
            <li>Sit amet (szczypta)</li>
        </ul>
        <p><?php skrypt4($conn,$id,"skrypt")?></p>
    </main>

    <section style="background: url(<?php skrypt4($conn,$id,"zdjecie")?>);">
        <h1>Blog kulinarny</h1>
    </section>
    <?php mysqli_close($conn)?>
</body>
</html>