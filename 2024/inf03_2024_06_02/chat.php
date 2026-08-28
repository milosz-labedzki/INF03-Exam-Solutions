<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
        <aside>
        <h3>
            Chaty
        </h3>
        <ul>
            <li>Ogólny</li>
            <li>Turystyczne
                <ol>
                    <li>Turystyczny</li>
                    <li>Żeglarski</li>
                    <li>Filatelistyczny</li>
                    <li>Hodowla zwierzątek domowych</li>
                </ol>
            </li>
        </ul>
        <h3>Uczestnicy</h3>
        <p>Jolanta Nowak</p>
        <img src="Jolka.jpg" alt="Jolanta Nowak">
        <p>Krzysztof Łukasiński</p>
        <img src="Krzysiek.jpg" alt="Krzysztof Łukasiński">
    </aside>
    <header>
        <h2>Chat</h2>
    </header>




    <main>
        <section id="chat">
            <div class="wypowiedz_j"><img src="Jolka.jpg" alt="Jolanta Nowak">Cześć idzeisz jutro do kina?</div>
            <div class="wypowiedz_k"><img src="Krzysiek.jpg" alt="Krzysztof Łukasińki">Tak! A ty?</div>
        </section>
        Wpisz wiadomość: <input type="text" name="wiadomosc" id="wiadomosc"> <button type="button" onclick="skrypt1()">Wyślij</button><br>
        <button type="button" onclick="skrypt2()">Generuj losową odpowiedź</button>
    </main>


    <footer>
        <h5>Chat wykonał: Miłosz Łabędzki</h5>
    </footer>
    <script>
        function skrypt1(){
            const wiadomosc = document.querySelector("#wiadomosc").value
            const div = document.createElement("div")
            div.className="wypowiedz_j";
            div.innerHTML = `<img src='Jolka.jpg' alt='Jolanta Nowak'>${wiadomosc}`
            const chat = document.querySelector("#chat")
            chat.appendChild(div)
            div.scrollIntoView();
        }
        function skrypt2(){
            const tablica = 
            [
            "Świetnie!",
            "Kto gra główną rolę?",
            "Lubisz filmy Tego reżysera?",
            "Będę 10 minut wcześniej",
            "Może kupimy sobie popcorn?",
            "Ja wolę Colę",
            "Zaproszę jeszcze Grześka",
            "Tydzień temu też byłem w kinie na Diunie",
            "Ja funduję bilety"
            ]
            let liczba = Math.floor(Math.random()*9)
            const div = document.createElement("div")
            div.className="wypowiedz_k"
            div.innerHTML=`${tablica[liczba]} <img src='Krzysiek.jpg' alt='Jolanta Nowak'>`
            const chat = document.querySelector("#chat")
            chat.appendChild(div)
            div.scrollIntoView();
        }
    </script>
</body>
</html>
