<?php
    function skrypt1(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_05");
        if(!$conn){
            echo " nie udalo sie polaczyc z baza";
            return;
        }
        $zapytanie = "SELECT `DATA`,Temat FROM `szkolenia` ORDER BY `Data` ASC;";
        $wynik = mysqli_query($conn,$zapytanie);
        $plik = fopen('harmonogram', 'w');
        while($wiersz=mysqli_fetch_row($wynik)){
            
            echo "<br> $wiersz[0] $wiersz[1] <br>";
            $linia = "$wiersz[0] $wiersz[1]\n";
            if($plik){
                fwrite($plik,$linia);
            }
        }
        if($plik){
            fclose($plik);
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <header>
            <img src="baner.jpg" alt="Szkolenia">
        </header>


        <menu>
            <ul>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="szkolenia.php">Szkolenia</a></li>
            </ul>

        </menu>

        <main>
            <?php skrypt1()?>
        </main>

        <footer>
            <h2>Firma szkoleniowa, ul.Główna 1,23-456 Warszawa</h2>
            <p>Autor: Miłosz Łabędzki</p>
        </footer>
    </section>
</body>
</html>
