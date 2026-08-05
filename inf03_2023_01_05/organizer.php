<?php 
    $conn = mysqli_connect("localhost","root","","inf03_2023_01_05");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    if(isset($_POST['wydarzenie'])&& $_POST['wydarzenie']!=""){
            $wydarzenie = $_POST['wydarzenie'];
            $zapytanie = "UPDATE `zadania` SET `wpis`='$wydarzenie' WHERE `dataZadania`='2020-08-09';";
            $wynik = mysqli_query($conn,$zapytanie);
        }
    function skrypt1($conn){
        $zapytanie = "SELECT dataZadania,wpis FROM `zadania` WHERE miesiac='sierpien';";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<section class='kalendarz'> <h5>$wiersz[0]</h5>  <p>$wiersz[1]</p></section>";
        }
        
    }
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <section id="ulozenie">
        
    <header id="pierwszy">
        <h1>Organizer: SIERPIEŃ</h1>
    </header>


    <header id="drugi">
        <form action="organizer.php" method="POST">
            Zapisz wydarzenie:<input type="text" name="wydarzenie">
            <button type="submit">OK</button>
        </form>
    </header>


    <header id="trzeci">
        <img src="logo2.png" alt="sierpień">
    </header>

    <main>
        <?php skrypt1($conn)?> 
    </main>
</section>
    
    <footer>
        <p>Stronę wykonał: brr brr</p>
    </footer>
    <?php mysqli_close($conn)?>    
</body>
</html>