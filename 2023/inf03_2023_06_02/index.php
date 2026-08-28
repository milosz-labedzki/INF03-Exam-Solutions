<?php
    $conn = mysqli_connect("localhost","root","","inf03_2023_06_02");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($conn){
        $zapytanie = "SELECT nazwa,cena FROM `towary` LIMIT 4;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<tr><td>$wiersz[0]</td> <td>$wiersz[1]</td></tr>";
        }
    }
    function skrypt2($conn){
        if(isset($_POST['sztuki'])&& $_POST['sztuki']!=""){
            $artykuly=$_POST['artykul'];
            $liczba = $_POST['sztuki'];
            $zapytanie = "SELECT cena FROM `towary` WHERE nazwa='$artykuly';";
            $wynik = mysqli_query($conn,$zapytanie);
            $wiersz = mysqli_fetch_row($wynik);
            $cena = $wiersz[0]*$liczba;
            echo "wartość zakupów: $cena";
        }
    }
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>
            Hurtownia z najlepszymi cenami
        </h1>
    </header>
<main>
    <section id="ulozenie">
    <aside id="lewy">
        <h2>Nasze ceny</h2>
        <table>
            <?php skrypt1($conn)?>
        </table>
    </aside>


    <section id="srodek">
        <h2>Koszt zakupów</h2>
        <form action="index.php" method="POST">
            Wybierz artykuł
            <select name="artykul">
                <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                <option value="Cyrkiel">Cyrkiel</option>
                <option value="Linijka 30 cm">Linijka 30 cm</option>
            </select><br>
            liczba sztuk: <input type="number" name="sztuki"><br>
            <button type="submit">OBLICZ</button><br>
        </form>
        <?php skrypt2($conn)?>
    </section>


    <aside id="prawy">
        <h2>Kontakt</h2>
        <img src="zakupy.png" alt="hurtownia">
        <p><a href="mailto:hurt@poczta2.pl">e-mail: hurt@poczta2.pl</a></p>
    </aside>

</section>
    <footer>
        <h4>Witrynę wykonał: Miłosz Łabędzki</h4>
    </footer>
    </main>
    <?php mysqli_close($conn)?>
</body>
</html>
