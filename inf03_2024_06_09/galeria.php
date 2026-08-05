<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zwiedzamy Polske</h1>
    </header>

    <section id="lewy">
        <button type="button" id="strzalka_lewa" onclick="skrypt2()"><</button>
    </section>


    <section id="srodek">
        <img src="1.jpg" alt="Aktywne zdjęcie" id="srodkowy_obraz">
    </section>


    <section id="prawy">
        <button type="button" id="strzalka_prawa" onclick="skrypt1()">></button>
    </section>

    
    <section id="miniatury">
        <img src="1.jpg" alt="Gdańsk" class="miniatura">
        <img src="2.jpg" alt="Kraków" class="miniatura">
        <img src="3.jpg" alt="Niedzica" class="miniatura">
        <img src="4.jpg" alt="Pieniny" class="miniatura">
        <img src="5.jpg" alt="Szklarska Poręba" class="miniatura">
        <img src="6.jpg" alt="Tatry" class="miniatura">
        <img src="7.jpg" alt="Wrocław" class="miniatura">
    </section>

    <footer>
        <h3>Autorem galerii jest: <p>brr brr</p></h3>
        <a href="http://pixabay.com" target="_blank">Więcej zdjęć</a>
    </footer>
    <script>
        
        let i = 1
        function skrypt1(){
                obraz = document.querySelector("#srodkowy_obraz")
                obraz.style.display='none'
                i+=1
                obraz.src=`${i}.jpg`
                obraz.style.display='block'
                if(i==8){
                    i=1
                    obraz.src=`${i}.jpg`
                }
        }
        function skrypt2(){
                obraz = document.querySelector("#srodkowy_obraz")
                obraz.style.display='none'
                i=i-1
                obraz.src=`${i}.jpg`
                obraz.style.display='block'
                if(i==0){
                    i=7
                    obraz.src=`${i}.jpg`
                }
        }
        
    </script>
    
</body>
</html>