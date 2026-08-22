<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_02");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($polaczenie){
        $zapytanie = "SELECT nazwa,plik FROM `towar` LIMIT 10;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
        echo "<img src='$wiersz[1]' alt='$wiersz[0]'>";
        }
    }
    function skrypt2($polaczenie){
        $zapytanie = "SELECT id,nazwa FROM `towar`;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<option value='$wiersz[0]'>$wiersz[1]</option>";
        }
    }
    function skrypt3($polaczenie){
        if(isset($_POST['owoc'])&& $_POST['owoc']!=""){
            $id = $_POST['owoc'];
            $kilogramy = $_POST['kg'];
            $zapytanie = "SELECT rodzaj,nazwa,cena FROM `towar` WHERE id = $id;";
            $wynik = mysqli_query($polaczenie,$zapytanie);
            $wiersz = mysqli_fetch_row($wynik);
            $wartosc = $wiersz[2] * $kilogramy;
            echo "<p> $wiersz[0] $wiersz[1] $wartosc zł</p>";
            $zapytanie_2 = "INSERT INTO `zamowienie`(`id_towar`, `id_sklep`, `liczba_kg`) VALUES ($id,2,$kilogramy);";
            $wynik_2 = mysqli_query($polaczenie,$zapytanie_2);
            }
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zdrowy bazarek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zdrowy bazarek</h1>
    </header>


    <nav>
        <?php skrypt1($conn)?>
    </nav>


    <main>


    <aside>
        <img src="market.png" alt="bazarek">
    </aside>


    <section>
        <p>Wybierz owoc lub warzywo i podaj jego wagę:</p>
        <form action="index.php" method="POST">
            <select name="owoc">
                <?php skrypt2($conn)?>
            </select>
            <input type="number" name="kg">
            <button type="submit">Zamów</button>
        </form>
        <?php skrypt3($conn)?>
    </section>


    </main>


    <footer>
        <p>Stronę opracował: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
