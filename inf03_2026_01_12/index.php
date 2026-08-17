<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatuaże</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header id="pierwszy">
        <img src="logo.png" alt="salon">
    </header>


    <header id="drugi">
        <h1>Salon tatuażu</h1>
    </header>


    <section id="sekcja">
        <h2>Galeria</h2>
        <img src="smok.png" alt="smok.png" class="miniatury">
        <img src="koliber.png" alt="kaliber.png" class="miniatury">
    </section>


    <aside>
        <h3>Dodaj wzór</h3>
        <label for="plik">Wzór<br></label><input type="file" name="plik" id="plik" accept="image/png"><br>
        <label for="kolor">Kolor:<br></label><select name="kolor" id="kolor"><br>
        <option value="Czarny">Czarny</option>
        <option value="Czerwony">Czerwony</option>
        <option value="Zielony">Zielony</option>
        <option value="Niebieski">Niebieski</option>
        </select><br>
        <label for="cena">Cena: <br></label><input type="number" name="cena" id="cena"><br>
        <button type="button" onclick="skrypt1()">Dodaj wzór</button>
    </aside>




    <footer>
        <p>Autor strony: Miłosz Łabędzki</p>
    </footer>
    <script>
        function skrypt1(){
            let nazwa = document.querySelector("#plik").value
            const kolor = document.querySelector("#kolor").value
            const cena = document.querySelector("#cena").value
            const ucieta_nazwa = nazwa.substr(12)
            alert(`Wzór ${ucieta_nazwa}, kolor ${kolor} w cenie ${cena} zł`)
            let obraz = document.createElement("img");
            let blok = document.querySelector("#sekcja")
            obraz.src=`${ucieta_nazwa}`
            obraz.alt=`${ucieta_nazwa}`
            obraz.className="miniatury"
            blok.appendChild(obraz)
        }
    </script>
</body>
</html>