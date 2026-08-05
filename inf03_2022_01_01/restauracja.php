<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauracja Wszystkie Smaki</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Witamy w restauracji "Wszystkie Smaki"</h1>
    </header>

    <main>
    <aside id="lewy">
        <img src="menu.jpg" alt="Nasze danie">
    </aside>


    <aside id="prawy">
        <h4>U nas dobrze zjesz!</h4>
        <ol>
            <li>Obiady od 40zł</li>
            <li>Przekąski od 10zł</li>
            <li>Kolacje od 20zł</li>
        </ol>
    </aside>

    </main>
    <section id="dolny">
        <h2>Zarezerwuj stolik on-line</h2>
        <form action="rezerwacja.php" method="POST">
            Data(format rrrr-mm-dd): <br><input type="text" name="data"><br>
            Ile osób? <br><input type="number" name="osoby"><br>
            Twój nuemr telefonu: <br><input type="text" name="telefon"><br>
            <input type="checkbox" name="zatwierdz"> Zgadzam się na przetwarzanie moich danych osobowych<br>
            <button type="reset">WYCZYŚĆ</button>
            <button type="submit">REZERWUJ</button>
        </form>
    </section>


    <footer>
        <p>Stronę opracował: <em>brr brr</em></p>
    </footer>
</body>
</html>