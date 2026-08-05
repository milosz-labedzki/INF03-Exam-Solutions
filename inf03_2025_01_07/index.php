<?php
    function skrypt1(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_07");
            if(!$conn){
                echo "nie udalo sie polaczyc z baza";
                return;
            }
            if(isset($_POST['poczatek'])&& $_POST['poczatek']!=""){
                $po = $_POST['poczatek'];
                echo "<p id='po'>$po </p>";
                $zapytnanie = "SELECT miasta.nazwa,wojewodztwa.nazwa FROM `miasta`,wojewodztwa WHERE wojewodztwa.id=miasta.id_wojewodztwa 
                AND miasta.nazwa LIKE '$po%' ORDER BY miasta.nazwa;";
                echo "<table> <tr>  <th> Miasto </th> <th> Województwo </th> </tr>";
                $wynik = mysqli_query($conn,$zapytnanie);
                while($wiersz = mysqli_fetch_row($wynik)){
                    echo "<tr>"."<td>".$wiersz[0]."</td>"."<td>".$wiersz[1]."</td>"."</tr>";
                }
                echo "</table>";
                }
        mysqli_close($conn);
        }
    
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav,png" type="image/x-icon">
</head>
<body>
    <section>
        <header>
            <img src="baner.jpg" alt="Polska">
        </header>

        <aside id="lewy_gora">
            <h4>Podaj początek nazwy miasta</h4>
            <form action="index.php" method="POST">
                <input type="text" name="poczatek">
                <button type="submit">Szukaj</button>
            </form>
        </aside> 

        <aside id="prawy">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
            <?php skrypt1()?>
        </aside>

        <aside id="lewy_dol">
            <p>Egzamin INF.03</p>
            <p>Autor: brr brr</p>
        </aside>
    </section>
</body>
</html>