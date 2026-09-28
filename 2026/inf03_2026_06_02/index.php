<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_06_02") or die("nie udalo sie polaczyc z baza");
    function skrypt1($polaczenie){
        $zapytanie = "SELECT idKontynent,nazwa FROM `kontynenty`;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<a href='index.php?id=$wiersz[0]'>$wiersz[1]</a>";
        }
    }
    function skrypt2($polaczenie){
        $id = 0;
        if(isset($_GET['id']) && $_GET['id'] != ""){
            $id = $_GET['id'];
        }
        else{
            $id = 6;
        }
        $zapytanie = "SELECT idObiekt,panstwo,nazwa,wartoscCechy FROM `obiekty` WHERE idRodzaj = 10 AND idKontynent = $id;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td>$wiersz[3]</td></tr>";
        }
    }
    function skrypt3($polaczenie){
        $zapytanie = "SELECT idTurysta,nick FROM `turysci`;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<option value='$wiersz[0]'>$wiersz[1]</option>";
        }
    }
    function skrypt4($polaczenie){
        if(isset($_POST['id']) && isset($_POST['turysta'])){
            $id = $_POST['id'];
            $turysta = $_POST['turysta'];
            $zapytanie = "INSERT INTO `osiagniecia`(`idObiekt`, `idTurysta`) VALUES ($id,$turysta);";
            $wynik = mysqli_query($polaczenie,$zapytanie);
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wodospady</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Łowcy wodospadów</h2>
    </header>


    <main>


    <aside>
        <?php skrypt1($conn)?>
    </aside>


    <section>
        <table>
            <tr>
                <th>Identyfikator</th>
                <th>Państwo</th>
                <th>Nazwa wodospadu</th>
                <th>Wysokość</th>
            </tr>
            <?php skrypt2($conn)?>
        </table>
        <h4>Wpisz osiągnięcie do bazy</h4>
        <form action="index.php" method="POST">
            <label for="id">identyfikator wodospadu <input type="number" name="id"></label>
            <label for="turysta">turysta
                <select name="turysta">
                    <?php skrypt3($conn)?>
                </select>
            </label>
            <button type="submit">Wpisz</button>
            <?php skrypt4($conn)?>
        </form>
    </section>


    </main>


    <article>
        <h3>Wodospady w Polsce</h3>
        <img src="pliki2/kamienczyk.jpg" alt="wodospad">
        <img src="pliki2/siklawica.jpg" alt="wodospad">
        <img src="pliki2/siklawa.jpg" alt="wodospad">
        <img src="pliki2/wilczki.jpg" alt="wodospad">
    </article>


    <footer>
        <p>Autor: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>