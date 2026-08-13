<?php
    $conn = mysqli_connect("localhost","root","","inf03_2022_06_01");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1(){
        global $conn;
        $zapytanie = "SELECT ryby.nazwa,lowisko.akwen,lowisko.wojewodztwo FROM `ryby`,lowisko WHERE ryby.id=lowisko.Ryby_id AND lowisko.rodzaj=3;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li> $wiersz[0] pływa w rzece $wiersz[1], $wiersz[2]</li>";
        }
    }
    function skrypt2(){
        global $conn;
        $zapytanie = "SELECT id,nazwa,wystepowanie FROM `ryby` WHERE styl_zycia=1;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<tr><td> $wiersz[0] </td> <td> $wiersz[1] </td> <td> $wiersz[2] </td></tr>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>

    <main>
        <section id="uloz_lewe">
    <aside id="lewy_1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <?php skrypt1()?>
        </ol>
    </aside>



    <aside id="lewy_2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php skrypt2()?>
        </table>
    </aside>
</section>

    <aside id="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="zapytania.txt">Pobierz kwerendy</a>
    </aside>
</main>


    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
