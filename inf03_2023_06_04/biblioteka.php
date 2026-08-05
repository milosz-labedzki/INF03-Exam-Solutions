<?php
    $conn = mysqli_connect("localhost","root","","inf03_2023_06_04");
    if(!$conn){
        echo "nie udalo sie polaczyc";
        return;
    }
    function skrypt1($conn){
        $zapytanie = "SELECT imie,nazwisko FROM `autorzy` ORDER BY nazwisko ASC;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li>  $wiersz[0] $wiersz[1]</li>";
        }
    }
     function skrypt2($conn){
        if(isset($_POST['imie'])&& $_POST['imie']!=""){
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $symbol = $_POST['symbol'];
            echo "Czytelnik $imie $nazwisko został(a) dodany do bazy danych";
            $zapytanie = "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('$imie','$nazwisko','$symbol');";
            $wynik = mysqli_query($conn,$zapytanie);
        }
     }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>    
<main>
    <aside id="lewy">
        <h3>Polecamy dzieła autorów</h3>
        <ol>
            <?php skrypt1($conn)?>
        </ol>
    </aside>


    <section id="srodek">
        <h3>ul. Czytelnicza 25,&nbsp;Ksiązkowice Wielkie&nbsp;</h3>
        <p>
            <a href="sekretariat@biblioteka.pl">Napisz do nas</a>
        </p>
        <img src="biblioteka.png" alt="książki">
   

</section>

    <section id="prawe">
    <aside id="prawy_1">
        <h3>Dodaj czytelnika</h3>
        <form action="biblioteka.php" method="POST">
            imię:<input type="text" name="imie"><br>
            nazwisko <input type="text" name="nazwisko"><br>
            symbol: <input type="number" name="symbol"><br>
            <button type="submit">Dodaj</button>
        </form>
    </aside>


    <aside id="prawy_2">
        <?php skrypt2($conn)?>
    </aside>
</section>
</main>
    <footer>
        <p>Projekt strony: brr brr</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>