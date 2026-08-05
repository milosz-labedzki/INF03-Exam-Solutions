<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep - rejestracja</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <aside>
        <img src="obraz.png" alt="promocje">
        <h2>Sprawdź promocje</h2>
        <table>
            <tr>
                <th>co?</th>
                <th>ile taniej?</th>
            </tr>
            <tr>
                <td>ubrania</td>
                <td>15%</td>
            </tr>
            <tr>
                <td>buty</td>
                <td>25%</td>
            </tr>
        </table>
    </aside>


    <header>
        <h1>Zarejestruj się w sklepie</h1>
    </header>


    <main>
        <button type="button" onclick="skrypt1()">Klient</button>
        <button type="button" onclick="skrypt2()">Adres</button>
        <button type="button" onclick="skrypt3()">Kontakt</button>
        <section id="pierwszy">
            <p>Imię</p>
            <input type="text" placeholder="Wpisz dane..." id="Imie" onblur="skrypt5()">
            <p>Nazwisko</p>
            <input type="text" id="Nazwisko" onblur="skrypt5()">
            <p>Data urodzenia</p>
            <input type="date" id="Data" onblur="skrypt5()">
        </section>
        
        <section id="drugi">
            <p>Ulica</p>
            <input type="text" id="Ulica" onblur="skrypt5()">
            <p>Numer</p>
            <input type="number"  id="Numer" onblur="skrypt5()">
            <p>Miasto</p>
            <input type="text"  id="Miasto" onblur="skrypt5()">
        </section>

        <section id="trzeci">
            <p>Numer komórkowy</p>
            <input type="tel" id="Numer_tel" onblur="skrypt5()"><br>
            <input type="checkbox"  id="akceptuje" onblur="skrypt5()">Akceptuję RODO<br>
            <button type="button" onclick="skrypt4()" id="Zatwierdz">Zatwierdź dane</button>
        </section>
    </main>


    <section id="blok_paska">
        <section id="pusty"></section>
    </section>

    <footer>
        <h4>Rejestrację do sklepu wykonał: brr brr</h4>
    </footer>
    <script>
        let szerokosc = 4;
        let pasek = document.querySelector("#pusty")
        function skrypt5(){
            if(szerokosc<=100){
                szerokosc += 12
                pasek.style.width=`${szerokosc}%`
            }
            
            
        }
        function skrypt1(){
            document.querySelector("#pierwszy").style.display="block"
            document.querySelector("#drugi").style.display="none"
            document.querySelector("#trzeci").style.display="none"
            pasek.style.width=`${szerokosc}%`
        }
        function skrypt2(){
            document.querySelector("#pierwszy").style.display="none"
            document.querySelector("#drugi").style.display="block"
            document.querySelector("#trzeci").style.display="none"
            pasek.style.width=`${szerokosc}%`
        }
        function skrypt3(){
            document.querySelector("#pierwszy").style.display="none"
            document.querySelector("#drugi").style.display="none"
            document.querySelector("#trzeci").style.display="block"
            pasek.style.width=`${szerokosc}%`
        }
        function skrypt4(){
            let Imie = document.querySelector("#Imie").value
            let Nazwisko = document.querySelector("#Nazwisko").value
            let Data = document.querySelector("#Data").value
            let Ulica = document.querySelector("#Ulica").value
            let Numer = document.querySelector("#Numer").value
            let Miasto = document.querySelector("#Miasto").value
            let Numer_tel =document.querySelector("#Numer_tel").value
            let zatwierdz = document.querySelector("#akceptuje").checked
            console.log(`${Imie},${Nazwisko},${Data},${Ulica},${Numer},${Miasto},${Numer_tel},${zatwierdz}`)
        }
    </script>
</body>
</html>