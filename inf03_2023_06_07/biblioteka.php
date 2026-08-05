<?php
    $conn = mysqli_connect("localhost","root","","inf03_2023_06_07");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza danych";
        return;
    }
    function skrypt1($conn){
        if(isset($_POST['imie'])&&$_POST['imie']!=""){
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $symbol = $_POST['symbol'];
        echo "Dodano czytelnika $imie $nazwisko";
        $zapytanie = "INSERT INTO `czytelnicy`( `imie`, `nazwisko`, `kod`) VALUES ('$imie','$nazwisko','$symbol');";
        $wynik = mysqli_query($conn,$zapytanie);
        }
    }
    function skrypt2($conn){
        $zapytanie = "SELECT imie,nazwisko FROM `czytelnicy` ORDER BY nazwisko ASC;";
        $wynik = mysqli_query($conn, $zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
        echo "<li>$wiersz[0] $wiersz[1]</li>";
        }
    }
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Małych</h1>
    </header>

<section id="ulozenie">
    <aside id="lewy">
        <h4>Dodaj czytelnika</h4>
        <form action="biblioteka.php" method="POST">
            imie: <input type="text" name="imie"><br>
            nazwisko: <input type="text" name="nazwisko"><br>
            symbol: <input type="number" name="symbol"><br>
            <button type="submit">AKCEPTUJ</button>
            <?php skrypt1($conn)?> 
        </form>
    </aside>


    <section id="srodek">
        <img src="biblioteka.png" alt="biblioteka">
        <h6>ul. &nbsp;Czytelników&nbsp;15 Ksiązkowice Małe</h6>
        <p><a href="biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
    </section>


    <aside id="prawy">
        <h4>Nasi czytelnicy:</h4>
        <ol>
            <?php skrypt2($conn)?>
        </ol>
    </aside>

</section>
    <footer>
        <p>Projekt witryny: brr brr</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>