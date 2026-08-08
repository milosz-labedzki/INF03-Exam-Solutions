<?php 
    $conn = mysqli_connect("localhost","root","","inf03_2023_01_02");
    if(!$conn){
        echo "nie udalo sie";
        return;
    }
    function skrypt1($conn){
        $zapytanie = "SELECT * FROM `pokoje`;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td></tr>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h1>Pasjonat pod dobrym humorem</h1>
    </header>

<section id="ulozenie">

        <aside id="lewy">
            <a href="index.html">GŁÓWNA</a>
            <img src="1.jpeg" alt="pokoje">
        </aside>


        <section id="srodek">
                <a href="cennik.php">CENNIK</a>
                <table>
                    <?php skrypt1($conn)?>
                </table>
        </section>


        <aside id="prawy">
            <a href="kalkulator.html">KALKULATOR</a>
            <img src="3.jpeg" alt="pokoje">
        </aside>

</section>

    <footer>
            <p>Stronę opracował: Miczek</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
