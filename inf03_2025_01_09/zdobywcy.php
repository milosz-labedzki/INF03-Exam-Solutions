<?php
    function skrypt1(){
        $conn = mysqli_connect("localhost","root","","inf03_2025_01_09");
        if(!$conn){
            echo "nie udalo sie polaczyc z baza";
            return;
        }
        $zapytanie = "SELECT nazwisko, imie,funkcja,email FROM `osoby`;";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz = mysqli_fetch_row($wynik)){
            echo "<tr> <td> {$wiersz[0]} </td> <td> {$wiersz[1]} </td><td> {$wiersz[2]} </td><td> {$wiersz[3]} </td></tr>";
        }
        mysqli_close($conn);
    }
    function skrypt2(){
       $conn = mysqli_connect("localhost","root","","inf03_2025_01_09");
        if(!$conn){
            echo "nie udalo sie polaczyc z baza";
            return;
        }  
        if(isset($_POST['Nazwisko'])&& $_POST['Nazwisko']!="" && isset($_POST['Imie'])&& $_POST['Imie']!="" 
        && isset($_POST['Funkcja'])&& $_POST['Funkcja']!="" && isset($_POST['email'])&& $_POST['email']!=""){
        
        $Nazwisko =  $_POST['Nazwisko'];   
        $Imie = $_POST['Imie'];
        $Funkcja = $_POST['Funkcja'];
        $email = $_POST['email'];
        $zapytanie = "INSERT INTO osoby (nazwisko,imie,funkcja,email) VALUES ('$Nazwisko','$Imie','$Funkcja','$email');";
        mysqli_query($conn,$zapytanie);
        }
        
        mysqli_close($conn);

    }
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>


    <nav>
        <a href="logo.jpg">kwerenda1</a>
        <a href="logo.jpg">kwerenda2</a>
        <a href="logo.jpg">kwerenda3</a>
        <a href="logo.jpg">kwerenda4</a>
    </nav>


    <aside id="lewy">
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </aside>


    <aside id="prawy">
        <h2>Dolącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza</p>
        <form action="zdobywcy.php" method="POST">
            <label for="Nazwisko">Nazwisko: <input type="text" name="Nazwisko"></label>
            <label for="Imie">Imię: <input type="text" name="Imie"></label>
            <label for="Funkcja">Funkcja <select name="Funkcja">
                <option value="uczestnik">uczestnik</option>
                <option value="przewodnik">przewodnik</option>
                <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                <option value="organizator">organizator</option>
                <option value="ratownik">ratownik</option>
            </label></select>
            <label for="Email">Email <input type="email" name="email"></label>
            <button type="submit">Dodaj</button><?php skrypt2()?><br><br>
            <table>
                <tr>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Funkcja</th>
                <th>Email</th>
                </tr>
                <?php skrypt1()?>
            </table>
        </form>
    </aside>

    <footer>
        <p>Stronę wykonał: brr brr</p>
    </footer>

</body>
</html>