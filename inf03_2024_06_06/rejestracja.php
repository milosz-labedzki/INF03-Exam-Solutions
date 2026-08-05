<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Formularz rejestracyjny konferencji <em>Nasze Kwiaty</em></h1>
    </header>


    <main>
        <section id="pierwszy">
            <h2>Dane osobowe</h2>
            <input type="text"  id="imie" placeholder="Wpisz imię..." required>
            <input type="text" id="nazwisko" placeholder="Wpisz nazwisko" required>
            <button type="button" onclick="skrypt1()">Następna karta</button>
        </section>
        <section id="drugi">
            <h2>Dane kontaktowe</h2>
            <input type="email" id="email" placeholder="Twój e-mail...">
            <input type="number" id="numer" placeholder="Twój numer telefonu...">
            <button type="button" onclick="skrypt2()">Następna karta</button>
        </section>
        <section id="trzeci">
            <h2>Hasło do logowania</h2>
            <input type="password" id="haslo" placeholder="Podaj hasło">
            <input type="password" id="powtorz_haslo" placeholder="Powtórz hasło">
            <button type="button" onclick="skrypt3()">Zatwierdź</button>
        </section>
    </main>


    <footer id="foot1">
        <video src="motyl.mp4" controls>Przeglądarka nie obsługuje formatu</video>
    </footer>


    <footer id="foot2">
        <h3>Plan konferencji</h3>
        <table>
            <tr>
                <td>9:00 - 12:00</td>
                <td>Pielęgnacja roślin</td>
            </tr>
            <tr>
                <td>13:00 - 15:00</td>
                <td>Targi kwiatowe</td>
            </tr>
        </table>
    </footer>


    <footer id="foot3">
        <p><a href="http://kwiaty.pl/">Internetowa kwiaciarnia</a></p>
    </footer>


    <footer id="foot4">
        <p>Formularz wykonał: brr brr</p>
    </footer>
    <script>
        function skrypt1(){
            document.querySelector("#pierwszy").style.visibility="hidden"
            document.querySelector("#drugi").style.visibility="visible"
        }
        function skrypt2(){
            document.querySelector("#drugi").style.visibility="hidden"
            document.querySelector("#trzeci").style.visibility="visible"
        }
        function skrypt3(){
            let haslo =document.querySelector("#haslo").value
            let haslo_rep = document.querySelector("#powtorz_haslo").value
            let imie =document.querySelector("#imie").value
            let nazwisko =document.querySelector("#nazwisko").value
            if(haslo!=haslo_rep){
                alert("Podane hasła różnią się")
            }
            console.log(`Witaj ${imie} ${nazwisko}`)
        }
    </script>
</body>
</html>