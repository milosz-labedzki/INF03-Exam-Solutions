<?php
    function skrypt1(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_11");
        if(!$conn){
            echo "nie udalo sie polacyc";
            return;
            }
        $zapytanie = "SELECT nazwa,opis,cena FROM `nagrody` ORDER BY RAND() LIMIT 5;";
        $wynik = mysqli_query($conn, $zapytanie);
        $i = 0;
        while($wiersz = mysqli_fetch_row($wynik)){
            $i += 1;
            echo "<tr>"."<td>".$i."</td>"."<td>".$wiersz[0]."</td>"."<td>".$wiersz[1]."</td>"."<td>".$wiersz[2]."</td>"."</tr>";
        }

        mysqli_close($conn);    
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        <header>
            <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
        </header>


        <aside id="lewy">
            <h3>Konkursowe nagrody</h3>
            <button onclick="location.reload()">Losuj nowe nagrody</button>
            <table>
                <tr><th>Nr</th><th>Nazwa</th><th>Opis</th><th>Wartosc</th></tr>
                <?php skrypt1()?>
            </table>
        </aside>


        <aside id="prawy">
            <img src="puchar.png" alt="Puchar dla wolontariusza">
            <h4>Polecane linki</h4>
            <ul>
                 <li><a href="puchar.png">Kwerenda1</a></li>
                 <li><a href="puchar.png">Kwerenda2</a></li>
                 <li><a href="puchar.png">Kwerenda3</a></li>
                 <li><a href="puchar.png">Kwerenda4</a></li>
             </ul>
        </aside>


        <footer>
            <p>Numer zdajacego: brrbrr</p>
        </footer>
</body>
</html>