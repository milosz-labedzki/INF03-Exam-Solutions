<?php   
        function skrypt1(){
            $conn = mysqli_connect("localhost","root","","inf03_2025_01_10");
        if(!$conn){
            echo "nie udalo sie polaczyc";
            return;
        }
        $zapytanie = "SELECT pseudonim,tytul,ranking,klasa FROM `zawodnicy` WHERE ranking > 2787 ORDER BY ranking DESC;";
        $wynik = mysqli_query($conn,$zapytanie);
        $i = 0;
        while($wiersz=mysqli_fetch_row($wynik)){
            $i=$i+1;
            echo "<tr>"."<td>".$i."</td>"."<td>".$wiersz[0]."</td>"."<td>".$wiersz[1]."</td>"."<td>".$wiersz[2]."</td>"."<td>".$wiersz[3]."</td>"."</tr>";
        }
        mysqli_close($conn);
    }
    function skrypt2(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_10");
        if(!$conn){
            echo "nie udalo sie polaczyc";
            return;
        }
        $zapytanie = "SELECT pseudonim,klasa FROM `zawodnicy` ORDER BY RAND() LIMIT 2;";
        $wynik = mysqli_query($conn, $zapytanie);
        $wiersz1=mysqli_fetch_array($wynik);
        $wiersz2=mysqli_fetch_array($wynik);
        echo "<h4> {$wiersz1['pseudonim']} {$wiersz1['klasa']} {$wiersz2['pseudonim']} {$wiersz2['klasa']} </h4>";
         mysqli_close($conn);
    }
    
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <em><h2>Koło szachowe gambit piona</h2></em>
    </header>

    <aside id="lewy">
        <h4>Polecane linki</h4>
        <ul>
            <li><a href="logo.png">Kwerenda1</a></li>
            <li><a href="logo.png">Kwerenda2</a></li>
            <li><a href="logo.png">Kwerenda3</a></li>
            <li><a href="logo.png">Kwerenda4</a></li>
        </ul>
        <img src="logo.png" alt="Logo koła">
    </aside>

    <aside id="prawy">
        <h3>Najlepsi gracze naszego koła</h3>
        <table>
            <tr>
            <th>Pozycja</th>
            <th>Pseudonim</th>
            <th>Tytuł</th>
            <th>Ranking</th>
            <th>Klasa</th>
            </tr>
            <?php skrypt1()?>
        </table>
        <form action="szachy.php" method="GET">
            <button type="submit">Losuj nową pare graczy</button><br>
            <?php skrypt2()?>
        </form>
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </aside>

    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>

</body>
</html>
