<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon kosmetyczny</title>
    <link rel="stylesheet" href="styl7.css">
</head>
<body>
    <main>
    <section id="ulozenie_l">
    <aside id="lewy_1">
        <h2>Nasza oferta</h2>
        <ol>
            <li><a href="twarz.html">Oczyszczanie twarzy</a>
                <ul>
                    <li>Peeling</li>
                    <li>Maska</li>
                </ul>
            </li>
            <li>Masaż</li>
            <li>Makijaż</li>
        </ol>
        <a href="index.php">Strona główna</a>
    </aside>


    <aside id="lewy_2">
        <img src="obraz1.jpg" alt="Personel">
    </aside>
</section>
<section id="ulozenie_p">
    <aside id="prawy_1">
        <h1>Usługi kosmetyczne</h1>
    </aside>


    <aside id="prawy_2">
        <h3>Kalkulator ceny wizyty</h3>
        <input type="checkbox" id="peeling" value="45">Peeling<br>
        <input type="checkbox" id="maska" value="30">Maska<br>
        <input type="checkbox" id="masaz" value="20">Masaż twarzy<br>
        <input type="checkbox" id="makijaz" value="50">Makijaż<br>
        <button type="button" onclick="skrypt1()">Oblicz cenę</button>
        <p id="wynik"></p>
    </aside>

</section>
</main>
    <footer>
        <p>Autor: brr brr</p>
    </footer>
    <script>
        function skrypt1(){
            let wartosc = 0;
            const peeling=document.querySelector("#peeling").value
            const maska=document.querySelector("#maska").value
            const masaz=document.querySelector("#masaz").value
            const makijaz=document.querySelector("#makijaz").value
            if(document.querySelector("#peeling").checked) wartosc += parseInt(peeling)
            if(document.querySelector("#maska").checked) wartosc += parseInt(maska)
            if(document.querySelector("#masaz").checked) wartosc += parseInt(masaz)
            if(document.querySelector("#makijaz").checked) wartosc += parseInt(makijaz)
           
           document.querySelector("#wynik").innerHTML=`Cena zabiegów: ${wartosc}`
        
        }
    </script>
</body>
</html>