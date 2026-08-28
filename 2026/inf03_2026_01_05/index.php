<?php
    $conn = mysqli_connect("localhost","root","","inf03_2026_01_05");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($polaczenie,$nazwa){
        if(isset($_POST['zawod'])&& $_POST['zawod']!=""){
        if($nazwa=="praca"){
        if($_POST['zawod']=="policjant"){
         echo "Wybrano opcje Policjant";
        }
        }else if($_POST['zawod']=="ratownik"){
            echo "Wybrano opcje Ratownik";
        }
        

        if($nazwa=="tabelka"){
            $zawod = $_POST["zawod"];
            $zapytanie = "SELECT id,imie,nazwisko FROM `personel` WHERE status = '$zawod';";
            $wynik = mysqli_query($polaczenie,$zapytanie);
            while($krotka=mysqli_fetch_row($wynik)){
            echo "<tr><td>$krotka[0]</td>
            <td>$krotka[1]</td>
            <td>$krotka[2]</td></tr>";
        }
            
        }
    }   
    }
    function skrypt2($polaczenie){
        $zapytanie = "SELECT id,nazwisko FROM `personel` WHERE id NOT IN (SELECT id_personel FROM rejestr);";
        $wynik = mysqli_query($polaczenie,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li>$wiersz[0] $wiersz[1]</li>";
        }
    }
    function skrypt3($polaczenie){
        if(isset($_POST['identyfikator'])&& $_POST['identyfikator']!=""){
            $id=$_POST['identyfikator'];
            $zapytanie = "INSERT INTO `rejestr`(`data`, `id_personel`, `id_pojazd`) VALUES (CURRENT_DATE,$id,14);";
            $wynik = mysqli_query($polaczenie,$zapytanie);
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZGŁOSZENIA</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zgłoszenia wydarzeń</h1>
    </header>


    <main>


    <section id="lewy">
        <h2>Personel</h2>
        <form action="index.php" method="POST">
            <input type="radio" name="zawod" value="policjant" checked> Policjant
            <input type="radio" name="zawod" value="ratownik"> Ratownik
            <button type="submit">Pokaż</button>
        </form>
        <?php skrypt1($conn,"praca")?>
        <table>
            <tr>
                <th>Id</th>
                <th>Imię</th>
                <th>Nazwisko</th>
            </tr>
            <?php skrypt1($conn,"tabelka")?>
        </table>
    </section>


    <section id="prawy">
        <h2>Nowe zgłoszenie</h2>
        <ol>
            <?php skrypt2($conn)?>
        </ol>
        <form action="index.php" method="POST">
            <label for="identyfikator">Wybierz id z listy: <input type="number" name="identyfikator" id="identyfikator"></label>
            <button type="submit">Dodaj zgłoszenie</button>
        </form>
        <?php skrypt3($conn)?>
    </section>

    
    </main>


    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
