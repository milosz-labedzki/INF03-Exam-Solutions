<?php
    function skrypt1(){
    $conn = mysqli_connect("localhost","root","","inf03_2025_01_12_");
    if(!$conn){
        echo "nie udal sie polaczyc";
        return;
    }
    $zapytanie = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
    $wynik = mysqli_query($conn,$zapytanie);
    while($wiersz=mysqli_fetch_row($wynik)){
        echo  "<option>".$wiersz[0]."</option>";
    } 

    mysqli_close($conn);
    }
    function skrypt2(){
           $conn = mysqli_connect("localhost","root","","inf03_2025_01_12_");
    if(!$conn){
        echo "nie udal sie polaczyc";
        return;
    }
    if(isset($_POST['rodzaj'])&& $_POST['rodzaj']!=""){
        $Rodzaj = $_POST['rodzaj'];
        $zapytanie = "SELECT Rodzaj,Nazwa,Gramatura,Cena FROM `wyroby` WHERE Rodzaj = '$Rodzaj';";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<tr>"."<td>".$wiersz[0]."</td>"."<td>".$wiersz[1]."</td>"."<td>".$wiersz[2]."</td>"."<td>".$wiersz[3]."</td>"."</tr>";
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
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni" id="wypieki">
    <nav>
        <a href="kwerenda1.png">KWERENDA 1</a>
        <a href="kwerenda1.png">KWERENDA 2</a>
        <a href="kwerenda1.png">KWERENDA 3</a>
        <a href="kwerenda1.png">KWERENDA 4</a>
    </nav>


    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie 
            bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>


    <main>
        <h4>Wybierz rodzaj wypieków</h4>
        <form action="piekarnia.php" method="POST">
            <select name="rodzaj">
               <?php skrypt1()?>
            </select>
            <button type="submit">Wybierz</button>
        </form>
        <table>
            <th>Rodzaj</th><th>Nazwa</th><th>Gramatura</th><th>Cena</th>
            <?php skrypt2()?>
        </table>
    </main>


    <footer>
        <p>AUTOR Miłosz Łabędzki</p><br>
        <p>Data 18.04.2026</p>
    </footer>


</body>
</html>
