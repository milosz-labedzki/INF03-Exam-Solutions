<?php 
    $conn = mysqli_connect("localhost","root","","inf03_2023_01_04");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    function skrypt1($conn){
        $zapytanie = "SELECT id,dataWyjazdu,cel,cena FROM `wycieczki` WHERE dostepna = TRUE;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li> $wiersz[0]. dnia $wiersz[1], jedziemy do: $wiersz[2], cena:$wiersz[3]</li>";
        }
    }
    function skrypt2($conn){
        $zapytanie ="SELECT nazwaPliku,podpis FROM `zdjecia` ORDER BY podpis DESC;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<img src='$wiersz[0]' alt='$wiersz[1]'>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>


    <section id="dane">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <?php skrypt1($conn)?>
    </section> 

    <section id="ulozenie">
    <aside id="lewy">
        <h2>Bestselery</h2>
        <table>
            <tr>
                <td>Wenecja</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>Londyn</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>Rzym</td>
                <td>wrzesień</td>
            </tr>
        </table>
    </aside>


    <section id="srodek">
        <h2>Nasze zdjęcia</h2>
        <?php skrypt2($conn)?>
    </section>


    <section id="prawy">
        <h2>Skontaktuj się</h2>
        <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </section>

</section>
    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
    <?php mysqli_close($conn)?>
</body>
</html>
