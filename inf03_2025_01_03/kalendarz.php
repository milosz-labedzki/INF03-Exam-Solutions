<?php function skrypt1(){
    $conn = mysqli_connect("localhost","root","","inf03_2025_01_03");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    $data = date("m-d"); 
    $zapytanie = "SELECT imiona FROM `imieniny` WHERE `data` = '$data';";
    $dzien_tygodnia= date('N');
    switch ($dzien_tygodnia){
        case 1:
        $dzien_tygodnia = 'poniedzialek';
        break;
        case 2:
        $dzien_tygodnia = 'wtorek';
        break;
        case 3:
        $dzien_tygodnia = 'sroda';
        break;
        case 4:
        $dzien_tygodnia = 'czwartek';
        break;
        case 5:
        $dzien_tygodnia = 'piatek';
        break;
        case 6:
        $dzien_tygodnia = 'sobota';
        break;
        case 7:
        $dzien_tygodnia = 'niedziela';
        break;
    }
    $data_pelna = date("d-m-y");
    $wynik = mysqli_query($conn, $zapytanie);
    while($wiersz = mysqli_fetch_row($wynik)){
        echo "Dzisiaj jest $dzien_tygodnia, $data_pelna, imieniny: $wiersz[0]";
    }

    mysqli_close($conn);
}
    function skrypt2(){
         $conn = mysqli_connect("localhost","root","","inf03_2025_01_03");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
        $data=$_POST['data'];
        $data_przeksztalcona=date("m-d",strtotime($data));
        $zapytanie="SELECT imiona FROM `imieniny` WHERE `data` = '$data_przeksztalcona';";
        $wynik = mysqli_query($conn,$zapytanie);
        while($wiersz=mysqli_fetch_row($wynik)){
            echo "Dnia $data są imieniny: $wiersz[0]";
        }
    mysqli_close($conn);
    }
    
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata</h1>
    </header>

    <section id="napis">
        <p><?php skrypt1()?></p>
    </section>
 <main>

    <section id="lewy">
        <table>
        <tr>
            <th>liczba dni</th>
            <th>miesiąc</th>
        </tr>
        <tr>
            <td rowspan="7">31</td>
            <td>styczeń</td>
        </tr>
        <tr>
            
            <td>marzec</td>
        </tr>
        <tr>
           
            <td>maj</td>
        </tr>
        <tr>
            
            <td>lipiec</td>
        </tr>
        <tr>
           
            <td>sierpień</td>
        </tr>
        <tr>
            
            <td>październik</td>
        </tr>
        <tr>
          
            <td>grudzień</td>
        </tr>
        <tr>
            <td rowspan="4">30</td>
            <td>kwiecień</td>
        </tr>
        <tr>
            
            <td>czerwiec</td>
        </tr>
        <tr>
            
            <td>wrzesień</td>
        </tr>
        <tr>
            
            <td>listopad</td>
        </tr>
        <tr>
            <td>28 lub 29</td>
            <td>luty</td>
        </tr>
        </table>
    </section>


    <section id="srodek">
        <h2>Sprawdź kto ma urodziny</h2>
        <form action="kalendarz.php" method="POST">
            <input type="date" min="2024-01-01" max="2024-12-31" required name="data">
            <button type="submit">Wyślij</button>
        </form>
        <?php skrypt2()?>
    </section>

    
    <section id="prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif" alt="Kalendarz Majów"></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>
                słoneczny  
                <ul>
                    <li>kalendarz Majów</li>
                    <li>juliański</li>
                    <li>gregoriański</li>
                </ul>
        </li>
        <li>
                księżycowy
             
            <ul>
                    <li>starogrecki</li>
                    <li>babiloński</li>
            </ul>
            </li>
        </ol>
    </section>
</main>

    <footer>
        <p>Stronę opracował: brr brr</p>
    </footer>
</body>
</html>