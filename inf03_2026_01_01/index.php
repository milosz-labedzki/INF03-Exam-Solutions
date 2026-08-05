<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_01");
    if(!$conn){
        echo "nie udalo sie połączyć z bazą";
    }
    function skrypt1($polaczenie){
        $zapytanie = "SELECT marka,model,cena,nazwa,doplata FROM `pojazdy`,kolory WHERE pojazdy.kolor=kolory.id AND model = 'alfa';";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
        $cena_calkowita= $wiersz[2] + $wiersz[4];
        echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[3]</td><td>$cena_calkowita</td></tr>";
    }
    }
    function skrypt2($polaczenie){
        $zapytanie = "SELECT marka,model,cena FROM `pojazdy` ORDER BY RAND() LIMIT 2;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        $wiersz = mysqli_fetch_row($wynik);
            echo "<tr><td>Marka</td><td>$wiersz[0]</td><td rowspan='2'>$wiersz[2]</td></tr>";
            echo "<tr><td>Model</td><td>$wiersz[1]</td></tr>";
     }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>


    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>


    <main>


    <section id="lewy">
        <table>
           <?php skrypt1($conn)?>
            
        </table>
    </section>


    <section id="srodek">
        <table>
        <tr>
            <th colspan="2">Konfiguracja</th>
            <th>Cena</th>
        </tr>
        <tr>
            <td colspan="3"><img src="a1.jpg" alt="Konfiguracja 1"></td>

        </tr>
            <?php skrypt2($conn)?>
        <tr>
            <td colspan="3"><img src="a2.jpg" alt="Konfiguracja 2"></td>
        </tr>
        <?php skrypt2($conn)?>
        </table>
    </section>


    <section id="prawy">
        <h3>111 222 444</h3>
        <img src="a3.png" alt="Samochód">
    </section>



    </main>


    <footer>
        <p>Stronę wykonał: brr brr</p>
    </footer>
</body>
</html>