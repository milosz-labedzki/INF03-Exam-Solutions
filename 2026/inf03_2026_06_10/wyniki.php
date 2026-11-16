<?php
    session_start();
    function skrypt2(){
    if(isset($_SESSION['nazwa'])){
        $nazwa = $_SESSION['nazwa'];
        echo "<p> Witaj, <strong> $nazwa </strong></p>";
    }
    else{
        header("Location: login.php");
    }
    }
    function skrypt3(){
        $polaczenie = mysqli_connect("localhost","root","","inf03_2026_06_10");
        if(!$polaczenie){echo "nie udalo sie polaczyc";}
        $zapytanie = "SELECT imie,nazwisko,pesel,zlecenie.data,plik FROM `Pacjent` LEFT JOIN zlecenie ON zlecenie.idPacjenta = pacjent.id LEFT JOIN Wynik ON Wynik.idZlecenia = zlecenie.id;";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            if($wiersz[4] != ''){
                echo "<tr> <td>$wiersz[0]</td> <td>$wiersz[1]</td> <td>$wiersz[2]</td> <td>$wiersz[3]</td> <td>$wiersz[4]</td><td><a href='pliki20/$wiersz[4]' target='_blank'>wynik</a></td></tr>";
            }
            if($wiersz[4] == ''){
                echo "<tr> <td>$wiersz[0]</td> <td>$wiersz[1]</td> <td>$wiersz[2]</td> <td>$wiersz[3]</td> <td>$wiersz[4]</td><td></td></tr>";
            }

        }

        mysqli_close($polaczenie);
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przeglądaj wyniki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Portal laboratorium</h1>
        <p><?php skrypt2()?></p>
        <p><a href="wyloguj.php">Wyloguj</a></p>
    </header>


    <main>
        <h2>Wyniki pacjentów</h2>
        <div id="blok">
        <table>
            <tr>
                <th>Imię pacjenta</th>
                <th>Nazwisko pacjenta</th>
                <th>PESEL</th>
                <th>Data zlecenia</th>
                <th>Data wykonania</th>
                <th>Wynik</th>
            </tr>
            <?php skrypt3()?>
        </table>
        </div>
    </main>

    
    <footer>
        <p>Wykonał: Miłosz Łabędzki</p>
    </footer>
</body>
</html>