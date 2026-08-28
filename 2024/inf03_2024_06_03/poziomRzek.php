<?php
    $conn = mysqli_connect("localhost","root","","inf03_2024_06_03");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($conn){
        if(isset($_POST['wybierz'])){
        $wybierz = $_POST['wybierz'];
        if($wybierz=='Wszystkie'){
            $zapytanie = "SELECT nazwa,rzeka,stanOstrzegawczy,stanAlarmowy,stanWody FROM `wodowskazy`,pomiary WHERE pomiary.wodowskazy_id=wodowskazy.id AND dataPomiaru='2022-05-05';";
            $wynik = mysqli_query($conn,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td>$wiersz[3]<td>$wiersz[4]</td></tr>";
            }
        }
        elseif($wybierz=='ostrzegawczy'){
            $zapytanie = "SELECT nazwa,rzeka,stanOstrzegawczy,stanAlarmowy,stanWody FROM `wodowskazy`,pomiary WHERE pomiary.wodowskazy_id=wodowskazy.id AND dataPomiaru='2022-05-05' AND stanWody>stanOstrzegawczy;";
            $wynik = mysqli_query($conn,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td>$wiersz[3]<td>$wiersz[4]</td></tr>";
            }
        }
        elseif($wybierz=='alarmowy'){
            $zapytanie = "SELECT nazwa,rzeka,stanOstrzegawczy,stanAlarmowy,stanWody FROM `wodowskazy`,pomiary WHERE pomiary.wodowskazy_id=wodowskazy.id AND dataPomiaru='2022-05-05' AND stanWody>stanAlarmowy;";
            $wynik = mysqli_query($conn,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td>$wiersz[3]<td>$wiersz[4]</td></tr>";
            }
        }
    }
    }
    function skrypt2($conn){
        $zapytanie = "SELECT dataPomiaru,AVG(stanWody) FROM `pomiary` GROUP BY dataPomiaru;";
        $wynil = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynil)){
            echo "<p>$wiersz[0]: $wiersz[1]</p>";
        }
    }
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <main>
    <header id="pierwszy">
        <img src="obraz1.png" alt="Mapa Polski">
    </header>


    <header id="drugi">
        <h1>Rzeki w województwie dolnośląskim</h1>
    </header>


    <menu>
        <form action="poziomRzek.php" method="POST">
            <label for="Wszystkie" class="pola_opcji">Wszystkie<input type="radio" name="wybierz" id="Wszystkie" value="Wszystkie"></label>
            <label for="Ponad stan ostrzegawczy" class="pola_opcji">Ponad stan ostrzegawczy<input type="radio" name="wybierz" id="Ponad stan ostrzegawczy" value="ostrzegawczy"></label>
            <label for="Ponad stan alarmowy" class="pola_opcji">Ponad stan alarmowy<input type="radio" name="wybierz" id="Ponad stan alarmowy" value="alarmowy"></label>
            <button type="submit">Pokaż</button>
        </form>
    </menu>


    <section id="lewy">
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
            </tr>
            <?php skrypt1($conn)?>
        </table>
    </section>


    <section id="prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <?php skrypt2($conn)?>
        <a href="https://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka">
    </section>
    </main>
    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
</body>
</html>
<?php mysqli_close($conn)?>
