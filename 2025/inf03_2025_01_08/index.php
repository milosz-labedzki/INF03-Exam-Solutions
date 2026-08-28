<?php
    function skrypt1(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_08");
        if(!$conn){
            echo "nie udalo sie polaczyc z baza";
            return;
        }
        if(isset($_POST['data_od'])&& $_POST['data_od']!="" && isset($_POST['data_do'])&& $_POST['data_do']!=""){
            $do = $_POST['data_do'];
            $od = $_POST['data_od'];
            $zapytanie = "SELECT klienci.Nazwisko,klienci.Imie,zamowienia.id,zamowienia.kod_koloru,zamowienia.pojemnosc,zamowienia.data_odbioru 
            FROM `klienci`,zamowienia WHERE klienci.id = zamowienia.id_klienta AND data_odbioru >= '$od' AND data_odbioru <= '$do' ORDER BY data_odbioru ASC;";
             $wynik = mysqli_query($conn,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "<tr> <td>$wiersz[0]</td><td> $wiersz[1]</td> <td>$wiersz[2]</td><td style='background-color:#$wiersz[3];'>$wiersz[3] </td><td>$wiersz[4]</td><td>$wiersz[5]</td></tr>";
            }

        }
         else if(isset($_POST['data_od'])&& $_POST['data_od']=="" && isset($_POST['data_do'])&& $_POST['data_do']==""){
            $zapytanie = "SELECT klienci.Nazwisko,klienci.Imie,zamowienia.id,zamowienia.kod_koloru,zamowienia.pojemnosc,zamowienia.data_odbioru
            FROM `klienci`,zamowienia WHERE klienci.id = zamowienia.id_klienta ORDER BY data_odbioru ASC;";
            $wynik = mysqli_query($conn,$zapytanie);
            while($wiersz=mysqli_fetch_row($wynik)){
                echo "<tr> <td>$wiersz[0]</td><td> $wiersz[1]</td> <td>$wiersz[2]</td><td style='background-color:#$wiersz[3];'>$wiersz[3] </td><td>$wiersz[4]</td><td>$wiersz[5]</td></tr>";
            }

        }


        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mieszalnia farb</title>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>

    <section id="formularz">
    <form action="index.php" method="POST">
        <label for="data_od">Data odbioru od: <input type="date" name="data_od" id="data_od"></label>
        <label for="data_do">do: <input type="date" name="data_do" id="data_do"></label>
        <button type="submit">Wyszukaj</button>
    </form>
    </section>


    <main>
        <table><tr>
            <th>Nr zamówienia</th>
            <th>Nazwisko</th>
            <th>Imię</th>
            <th>Kolor</th>
            <th>Pojemność[ml]</th>
            <th>Data odbioru</th>
        </tr>
        <?php skrypt1()?>
        </table>
    </main>


    <footer>
        <h3>Egzamin inf03</h3>
        <p>Autor: Miłosz Łabędzki</p>
    </footer>
</body>
</html>
