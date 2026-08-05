<?php
    function skrypt1(){
        $conn = mysqli_connect("localhost","root","","inf03_2024_06_07");
        if(!$conn){
            echo "nie udalo sie polaczyc z baza danych";
            return;
        }
        $zapytanie="SELECT ulica FROM `lokalizacje`;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li>ulica $wiersz[0]</li>";
        }

        mysqli_close($conn);
    }
    function skrypt2(){
        $conn = mysqli_connect("localhost","root","","inf03_2024_06_07");
        if(!$conn){
            echo "nie udalo sie polaczyc z baza danych";
            return;
        } 
        $zapytanie = "SELECT rejestracja,waga,dzien,czas,ulica FROM `wagi`,lokalizacje WHERE lokalizacje.id = wagi.lokalizacje_id AND waga>5;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<tr><td>$wiersz[0]</td> <td>$wiersz[4]</td> <td>$wiersz[1]</td> <td>$wiersz[2]</td> <td>$wiersz[3]</td></tr>";
        } 
        mysqli_close($conn);
    }
    function skrypt3(){
        $conn = mysqli_connect("localhost","root","","inf03_2024_06_07");
        if(!$conn){
            echo "nie udalo sie polaczyc z baza danych";
            return;
        } 
        $zapytanie = "INSERT INTO `wagi`(`lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES ('5',FLOOR(1 + RAND() * (10 - 1 +1)),'DW12345',CURRENT_DATE,CURRENT_TIME);";
        //$wynik = mysqli_query($conn,$zapytanie);
        // header("Refresh:10");
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="pierwszy">
        <h1>Ważenie pojazdów we Wrocławiu</h1>
    </header>


    <header id="drugi">
        <img src="obraz1.png" alt="waga">
    </header>


    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <ol>
            <?php skrypt1()?>
        </ol>
        <h2>Kontakt</h2>
        <a href="mailto:wazenie@wroclaw.pl">napisz</a>
    </section>


    <section id="srodek">
        <h2>Alerty</h2>
        <table>
            <tr>
                <th>rejestracja</th>
                <th>ulica</th>
                <th>waga</th>
                <th>dzień</th>
                <th>czas</th>
            </tr>
            <?php skrypt2()?>
        </table>
        <?php skrypt3()?>
    </section>


    <section id="prawy">
        <img src="obraz2.jpg" alt="tir" id="obraz_2">
    </section>


    <footer>
        <p>Stronę wykonał: brr brr</p>
    </footer>
</body>
</html>