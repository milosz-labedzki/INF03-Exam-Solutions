<?php
    function skrypt1(){
    $i="";
    while($i<10){
        echo "<img src='$i.jpg' alt='' class='wzory' title='$i'>";
        $i++;
    }

    }

    ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylizacja paznokci</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="uloz">
    <aside>
        <img src="manicure.jpg" alt="Stylizacja paznokci">
    </aside>

    <main>


    <header>
        <h1>Twoje wymarzone paznokcie</h1>
    </header>


    <nav>
        <button type="button" onmouseover="skrypt2('pierwszy_przycisk')" id="btn_pierwszy">Kolor</button>
        <button type="button" onmouseover="skrypt2('drugi_przycisk')" id="btn_drugi">Kształt</button>
        <button type="button" onmouseover="skrypt2('trzeci_przycisk')" id="btn_trzeci">Wzór</button>
    </nav>


    <section id="pierwszy">
        <h2>Kolor</h2>
        <img src="kolory.png" alt="Kolory paznokci"><br>
        <input type="color" id="kolor" value="#FF0000">
    </section>


    <section id="drugi">
        <h2>Kształt</h2>
        <img src="ksztalt.png" alt="Kształty paznokci"><br>
        <select name="ksztalt" id="ksztalt">
            <option value="migdał">migdał</option>
            <option value="zaokrąglony">zaokrąglony</option>
            <option value="kwadratowy">kwadratowy</option>
            <option value="balerina">balerina</option>
            <option value="zaokrąglony kwadrat">zaokrąglony kwadrat</option>
        </select>
    </section>


    <section id="trzeci">
        <h2>Wzór</h2>
        <?php skrypt1()?><br>
        <input type="number" min="1" max="10">
    </section>

    
    </main>
</div>

    <footer>
        <p>Autor strony: <em>Miłosz Łabędzki</em></p>
    </footer>
    <script>
        function skrypt2(przycisk){
            let blok1 = document.querySelector("#pierwszy")
            let blok2 = document.querySelector("#drugi")
            let blok3 = document.querySelector("#trzeci")
            let button_jeden = document.querySelector("#btn_pierwszy")
            let button_dwa = document.querySelector("#btn_drugi")
            let button_trzy = document.querySelector("#btn_trzeci")
            if(przycisk=='pierwszy_przycisk'){
                blok1.style.display="block"
                blok2.style.display="none"
                blok3.style.display="none"
                button_jeden.style.backgroundColor="Salmon"
                button_dwa.style.backgroundColor="Crimson"
                button_trzy.style.backgroundColor="Crimson"
            }
            if(przycisk=='drugi_przycisk'){
                blok1.style.display="none"
                blok2.style.display="block"
                blok3.style.display="none"
                button_jeden.style.backgroundColor="Crimson"
                button_dwa.style.backgroundColor="Salmon"
                button_trzy.style.backgroundColor="Crimson"

            }
            if(przycisk=='trzeci_przycisk'){
                blok1.style.display="none"
                blok2.style.display="none"
                blok3.style.display="block"
                button_jeden.style.backgroundColor="Crimson"
                button_dwa.style.backgroundColor="Crimson"
                button_trzy.style.backgroundColor="Salmon"
            }
        }
    </script>
</body>
</html>