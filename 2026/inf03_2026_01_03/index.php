<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pola figur</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Pola figur płaskich</h2>
    </header>


    <main>


    <nav>
        <h3>MENU</h3>
        <ul>
            <li><a href="index.php">Prostokąt i trójkąt</a></li>
            <li><a href="kolo.html">Okrąg i koło</a></li>
        </ul>
    </nav>


    <section>
        <div>
        <img src="1d.bmp" alt="Figura" id="trojkat" class="figura"> <img src="2d.bmp" alt="prostokat" id="prostokat" style="display: none" class="figura"></div><br>
        <img src="1m.bmp" alt="Wybierz trójkąt" onclick="skrypt1('pierwszy')" class="obraz">
        <img src="2m.bmp" alt="Wybierz prostokąt" onclick="skrypt1('drugi')" class="obraz">
    </section>


    <aside>
        <h3>Pole prostokąta  / pole trójkąta</h3>
        <label for="bok_podstawa">Bok prostokąta / podstawa trójkąta:<br> <input type="number" name="bok_podstawa" id="bok_podstawa"></label><br>
        <label for="bok_wysokosc">Drugi bok prostokąta / wysokość trójkąta: <br><input type="number" name="bok_wysokosc" id="bok_wysokosc"></label><br>
        <button type="button" onclick="skrypt2()">Oblicz</button><br>
        <p id="wynik"></p>
    </aside>


    </main>

    <footer>
        <p>Autor: Miłosz Łabędzki</p>
    </footer>
    <script>
        let obraz="";
        function skrypt1(obrazek){
            obraz = obrazek;
            if(obrazek=='pierwszy'){
                document.querySelector("#trojkat").style.display="block"
                document.querySelector("#prostokat").style.display="none"
            }
            else if(obrazek=='drugi'){
                document.querySelector("#trojkat").style.display="none"
                document.querySelector("#prostokat").style.display="block"
            }
        }
            function skrypt2(zdjecie=obraz){
                let bok=document.querySelector("#bok_podstawa").value
                let drugi_wysokosc=document.querySelector("#bok_wysokosc").value
                if(zdjecie=='pierwszy'){
                    const pole_trojkata = (bok*drugi_wysokosc)/2
                    document.querySelector("#wynik").innerHTML=`${pole_trojkata}`
                }
                else if(zdjecie=='drugi'){
                    const pole_prostokata = bok*drugi_wysokosc;
                    document.querySelector("#wynik").innerHTML=`${pole_prostokata}`
                }
                else{
                    const pole_trojkata = (bok*drugi_wysokosc)/2
                    document.querySelector("#wynik").innerHTML=`${pole_trojkata}`
                }
            }
    </script>
</body>
</html>
