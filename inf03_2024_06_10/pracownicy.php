<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasz zespół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header>
         <img src="logo.png" alt="logo firmy">
    </header>
    <header>
        <h1>Nasz zespół</h1>
    </header>

    <main>
        <section class="karta">
                <img src="osoba1.jpg" alt="Dyrektor"  class="w_karcie">
                <h4>Krzysztof Dobromilski</h4>
                <h3>Dyrektor</h3>
                <p>Firma logistyczna była jego marzeniem. Zrealizował je 10 lat temu. Nasza firma prosperuje dzięki Krzysztofowi</p>
                <p>telefon: 111222333</p>
                <a href="mailto:Krzysztof.Dobromilski@firma.pl"><h5>Kontakt</h5></a>
        </section>


        <section class="karta">
                <img src="osoba2.jpg " alt="Kierownik logistyków" class="w_karcie">
                <h4>Joanna Trojanowska</h4>
                <h3>Kierownik logistyków</h3>
                <p>Od początku firmy z nami. Wie jak zorganizować pracę swoich logistyków aby wszystko było na czas</p>
                <p>telefon: 222333444</p>
                <a href="mailto:Joanna.Trojanowska@firma.pl"><h5>Kontakt</h5></a>
        </section>

        <section class="karta">
                <img src="osoba3.jpg" alt="Kadry"  class="w_karcie">
                <h4>Ewa Nowak</h4>
                <h3>Księgowość i kadry</h3>
                <p>Od lat finanse powierzamy niezawodnej Ewie. Twardą ręką trzyma kasę i dba o wszystkich pracowników</p>
                <p>telefon: 333444555</p>
                <a href="mailto:Ewa.Nowak@firma.pl"><h5>Kontakt</h5></a>
        </section>
    </main>


    <section id="cytat">
        <section id="pierwszy" onclick="skrypt1()">
           <q> "Każdego dnia stawiam sobie nieosiągalne wyzwania i próbuję je wykonać"
                - Krzysztof</q>
        </section>
        <section id="drugi" onclick="skrypt2()">
            <q>"Nie bój się porażek, im więcej ich rozwiążesz, tym szybciej osiągniesz cel"
            - Joanna</q>
        </section>
        <section id="trzeci" onclick="skrypt3()">
            <q> "Niezadowolony pracownik jest dla mnie źródłem nauki"
            - Ewa</q>
        </section>
    </section>


    <footer>
        <p>Stronę wykonał: Miłosz Łabędzki</p>
    </footer>

    <script>
        function skrypt1(){
            document.querySelector("#pierwszy").style.display="none"
            document.querySelector("#drugi").style.display="block"
        }
        function skrypt2(){
            document.querySelector("#drugi").style.display="none"
            document.querySelector("#trzeci").style.display="block"
        }
        function skrypt3(){
            document.querySelector("#trzeci").style.display="none"
            document.querySelector("#pierwszy").style.display="block"
        }
    </script>
</body>
</html>
