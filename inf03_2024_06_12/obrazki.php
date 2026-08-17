<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efekty obrazy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Efekty na obrazach</h2>
    </header>


    <section id="lewy_gora">
        <img src="pszczola.jpg" alt="pszczoła na fioletowym kwiatku" id="pszczola"><br>
        <input type="radio" name="efekt" id="Blur">Blur<br>
        <input type="radio" name="efekt" id="Sepia">Sepia<br>
        <input type="radio" name="efekt" id="Negatyw">Negatyw<br>
        <button type="button" onclick="skrypt1()">Zastosuj</button>
    </section>



    <section id="prawy_gora">
        <img src="pomarancza.jpg" alt="drzewo pomarańczy" id="pomarancz"><br>
        <button type="button" onclick="skrypt2()">Kolorowy</button><br>
        <button type="button" onclick="skrypt3()">Czarno-biały</button>
    </section>



    <section id="lewy_dol">
        <img src="owoce.jpg" alt="Kosz pełen owoców" id="owoce"><br>
        <input type="range" id="przezroczystosc" class="suwak" value="100" min="0" max="100"><br>
        <button type="button" onclick="skrypt4()">Zastosuj</button>
    </section>



    <section id="prawy_dol">
        <img src="zolw.jpg" alt="Żółw w wodzie" id="zolw"><br>
        <input type="range" id="jasnosc" class="suwak" min="0" max="250" ><br>
        <button type="button" onclick="skrypt5()">Zastosuj</button>
    </section>


    <footer>
        <p><a href="http://www.css.com/" target="_blank">Zobacz inne efekty obrazu</a></p>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>
    <script>
        function skrypt1(){
            let blur_sprawdz=document.querySelector("#Blur").checked
            let sepia_sprawdz=document.querySelector("#Sepia").checked
            let negatyw_sprawdz=document.querySelector("#Negatyw").checked
            
            if(blur_sprawdz){
                document.querySelector("#pszczola").style.filter="blur(6px)";
            }
            else if(sepia_sprawdz){
                document.querySelector("#pszczola").style.filter="sepia(100%)";
            }
            else if(negatyw_sprawdz){
                document.querySelector("#pszczola").style.filter="invert(100%)";
            }
        }
        function skrypt2(){
            document.querySelector("#pomarancz").style.filter="none"
        }
        function skrypt3(){
            document.querySelector("#pomarancz").style.filter="grayscale(100%)"
        }
        function skrypt4(){
            let wartosc_suwak=document.querySelector("#przezroczystosc").value
            document.querySelector("#owoce").style.filter=`opacity(${wartosc_suwak}%)`
        }
        function skrypt5(){
            let wartosc_suwak =document.querySelector("#jasnosc").value
            document.querySelector("#zolw").style.filter=`brightness(${wartosc_suwak}%)`
        }
    </script>
</body>
</html>
