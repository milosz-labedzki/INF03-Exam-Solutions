<?php 
    $conn = mysqli_connect("localhost","root","","inf03_2023_01_03");
    if(!$conn){
        echo "nie udalo sie polaczyc";
        return;
    }
    function skrypt1($conn){
        if(isset($_POST['miasto'])&& $_POST['miasto']!=""){
            $miasto = $_POST['miasto'];
            $zapytanie = "SELECT nazwa,ulica FROM `kwiaciarnie` WHERE miasto = '$miasto';";
            $wynik = mysqli_query($conn,$zapytanie);
            $wiersz = mysqli_fetch_row($wynik);
            echo "<h3> $wiersz[0], $wiersz[1] </h3>";
        }
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>Grupa Polskich Kwiaciarni</h1>
    </header>

    <main>
    <aside id="lewy">
        <h2>Menu</h2>
        <ol>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="httpsL//www.kwiaty.pl" target="_blank">Rozpozaj kwiaty</a></li>
            <li><a href="znajdz.php">Znajdź kwiaciarnię</a>
                <ul>
                    <li>w Warszawie</li>
                    <li>w Malborku</li>
                    <li>w Poznaniu</li>
                </ul>
            </li>
        </ol>
    </aside>


    <aside id="prawy">
        <h2>Znajdź kwiaciarnię</h2>
        <form action="znajdz.php" method="POST">
            Podaj nazwę miasta: <input type="text" name="miasto">
            <button type="submit">SPRAWDŹ</button>
        </form>
        <?php skrypt1($conn)?>
    </aside>
    </main>

    <footer>
            <p>Stronę opracował: Miczek</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
