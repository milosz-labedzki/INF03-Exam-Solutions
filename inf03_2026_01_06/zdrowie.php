<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_06");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($polaczenie){
        $zapytanie = "SELECT nazwa FROM `choroby` WHERE zakazna = 'T';";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li>$wiersz[0]</li>";
        }
    }
    function skrypt2($polaczenie){
        $zapytanie = "SELECT id,nazwa FROM `choroby`;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<option value='$wiersz[0]'>$wiersz[1]</option>";
        }
    }
    function skrypt3($polaczenie){
        if(isset($_POST['choroba'])&&$_POST['choroba']!=""){
            $choroba = $_POST['choroba'];
            $zapytanie = "SELECT nazwa FROM `objawy`,choroby_objawy WHERE objawy.id=choroby_objawy.id_objawy AND id_choroby = $choroba;";
            $wynik = mysqli_query($polaczenie,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "<span> $wiersz[0] </span>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wykaz chorób</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Informacja o chorobach w Polsce</h1>
    </header>


    <nav>
        <a href="https://szpitale.pl/" target="_blank">Szpitale</a>
        <a href="https://www.przychodnie.pl/" target="_blank">Przychodnie</a>
        <a href="https://www.nfz.gov.pl/" target="_blank">NFZ</a>
    </nav>


    <main>


    <section id="lewy">
        <h1>Choroby zakaźne</h1>
        <ol>
            <?php skrypt1($conn)?>
        </ol>
    </section>


    <section id="prawy">
        <h2>Objawy chorób</h2>
        <form action="zdrowie.php" method="POST">
            <select name="choroba">
                <?php skrypt2($conn)?>
            </select>
            <button type="submit">Sprawdź</button>
        </form>
        <div id="wynik"><?php skrypt3($conn)?></div>
    </section>


    </main>


    <footer>
        <p>Stronę obracował: Miczek</p>
    </footer>
    <img src="zdrowia.png" alt="Życzymy zdrowia!">
    <?php mysqli_close($conn)?>
</body>
</html>