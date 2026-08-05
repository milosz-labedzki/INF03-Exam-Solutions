<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fryzjerstwo</title>
    <link rel="stylesheet" href="styl8.css">
</head>
<body>
    <main>
        <aside id="lewy">
        <section id='lewy_1'>
            <a href="index.html">SALON FRYZJERSKI</a>
        </section>


        <section id="lewy_2">
            <h4>PROMOCJA!</h4>
            <input type="radio" name="wlosy" id="krotkie" value="25">Krótkie<br>
            <input type="radio" name="wlosy" id="srednie" value="30">Średnie<br>
            <input type="radio" name="wlosy" id="poldlugie" value="40">Półdługie<br>
            <input type="radio" name="wlosy" id="dlugie" value="50">Długie<br>
            <button type="button" onclick="skrypt1()">Odkryj promocje</button><br><br>
            <span id="wynik"></span>
        </section>


        <section id="lewy_3">
            <p>Witaj! Miło nam, że odwiedziłeś nasz salon. Sprawdź promocje!</p>
            <h4>Kontakt: 444 555 666</h4>
        </section>
    </aside>
    <aside id="prawy">         
            <section id="prawy_1">
                <h4><a href="fryzura.php">Ceny strzyżenia</a></h4>
                <table>
                    <tr>
                        <th>Długość włosów</th>
                        <th>Cena</th>
                    </tr>
                    <tr>
                        <td>Krótkie</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>Średnie</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <td>Półdługie</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>Długie</td>
                        <td>50</td>
                    </tr>
                </table>
            </section>


            <section id="prawy_2">
                <img src="obraz1.jpg" alt="Fryzjerka">
            </section>
    </aside>
</main>
    <footer>
        <p>Autor: brr brr</p>
    </footer>
    <script>
        function skrypt1(){
            let wybrane = document.querySelector("input[name='wlosy']:checked").value;
            if(wybrane){
                let wartosc = parseInt(wybrane) - 10
                document.querySelector("#wynik").innerHTML=`cena promocyjna: ${wartosc}`
            }
        }
    </script>
</body>
</html>