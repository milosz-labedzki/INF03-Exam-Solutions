<?php
    session_start();
    if(isset($_POST['login']) && isset($_POST['haslo'])){
        if($_POST['login']=='admin' && $_POST['haslo'] == 'TajneHaslo321*'){
            $_SESSION['nazwa'] = $_POST['login'];
            header("Location: wyniki.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Portal laboratorium</h1>
    </header>


    <main id="glowny">
        <h2>Zaloguj się do systemu</h2>
        <form action="login.php" method="POST">
            <label for="login">Login:</label> <input type="text" name="login"><br>
            <label for="haslo">Hasło:</label><input type="password" name="haslo"><br>
            <button type="submit" id="zaloguj">Zaloguj</button>
        </form>
    </main>

    
    <footer>
        <p>Wykonał: Miłosz Łabędzki</p>
    </footer>
</body>
</html>