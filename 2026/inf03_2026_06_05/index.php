<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_06_05");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
    }
    function skrypt1($polaczenie,$wariant){
        $i = 0;
        $mebel = "";
        if($wariant == '1a'){$i = 1; $mebel = 'sofy';}
        if($wariant == '1b'){$i = 2; $mebel = 'fotele';}
        if($wariant == '1c'){$i = 3; $mebel = 'komody';}
        $zapytanie = "SELECT idMeble,nazwa,plik,styl,cena,opis FROM `meble` WHERE kategoria = $i";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<div class='mebel'>
            <div class='obraz'>
                    <img src='pliki5/$mebel/$wiersz[2]' alt='mebel'>
            </div>
            <div>
                    <h3>$wiersz[1]</h3>
                    <h4>styl $wiersz[3]</h4>
                    <h3>CENA: $wiersz[4] zł</h3>
                    <form action='index.php' method='POST'>
                        <button type='submit' value='$wiersz[0]' name='formularz'>KUP</button>
                    </form>
            </div>
            <div class='opis'>
                $wiersz[5]
            </div>
                    </div>"
            ;
            
        }

    }
        function skrypt2($polaczenie){
        if(isset($_POST['formularz'])){
            $wartosc = $_POST['formularz'];
            $zapytanie = "INSERT INTO `zakupy`(`idKlienci`, `idMeble`, `sztuk`) VALUES (1,$wartosc,1)";
            $wynik = mysqli_query($polaczenie,$zapytanie);
        }
    }
        function skrypt3($polaczenie){
            $cena_calkowita = 0;
            echo "<ol>";
            $zapytanie = "SELECT meble.nazwa,meble.cena FROM `meble` JOIN zakupy ON meble.idMeble = zakupy.idMeble JOIN klienci ON zakupy.idKlienci = klienci.idKlienci;";
            $wynik = mysqli_query($polaczenie,$zapytanie);
            while($wiersz = mysqli_fetch_row($wynik)){
                echo " <li>$wiersz[0] $wiersz[1]</li>";
                $cena_calkowita += $wiersz[1];
            }
            echo "</ol>";
            echo "Koszt całkowity: $cena_calkowita";
        }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprzedaż antyków</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Najlepsze antyki w mieście</h1>
    </header>


    <main>


    <section>
        <h2>-Sofy-</h2>
        <?php skrypt1($conn,'1a')?>

        <h2>-Fotele-</h2>
        <?php skrypt1($conn,'1b')?>

        <h2>-Komody-</h2>
        <?php skrypt1($conn,'1c')?>

        <?php skrypt2($conn)?>
    </section>


    <aside>
        <h2>Koszyk</h2>
        <p>Zalogowano: Anna Kowalska</p>
        <?php skrypt3($conn)?>
    </aside>


    </main>


    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>