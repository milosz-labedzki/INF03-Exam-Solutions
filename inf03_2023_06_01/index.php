<?php
    $conn = mysqli_connect("localhost","root","","inf03_2023_06_01");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($conn){
        $zapytanie = "SELECT nazwa FROM `towary` WHERE promocja = TRUE;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li> $wiersz[0] </li>";
        }
    }
    function skrypt2($conn){
        if(isset($_POST['towar'])&& $_POST['towar']!=""){
            $towar = $_POST['towar'];
            $zapytanie = "SELECT cena FROM `towary` WHERE nazwa='$towar';";
            $wynik = mysqli_query($conn,$zapytanie);
            $wiersz = mysqli_fetch_row($wynik);
            $cena = $wiersz[0] * 0.7;
            echo "<div id='wynik'> cena regularna: $wiersz[0] <br> cena w promocja 30%: $cena</div>";
        }
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>
    <section id="ulozenie">
    <aside id="lewy">
        <h2>Taniej o 30%</h2>
        <ol>
            <?php skrypt1($conn)?>
        </ol>
    </aside>


    <section id="srodek">
        <h2>Sprawdź cenę</h2>
        <form action="index.php" method="POST">
            <select name="towar">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            <button type="submit">Sprawdź</button>
        </form>
        <?php skrypt2($conn)?>
    </section>


    <aside id="prawy">
        <h2>Kontakt</h2>
        <p><a href="mailto:bok@sklep.pl">e-mail: bok@sklep.pl</a></p>
        <img src="promocja.png" alt="promocja">
    </aside>
  </section>        
        
        <footer>
        <h4>Autor strony: brr brr</h4>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>