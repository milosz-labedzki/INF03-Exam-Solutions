<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Systemy liczbowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <img src="cyfry.gif" alt="Cyfry szesnastkowe">
        <h1>Pozycyjne systemy liczbowe</h1>
    </header>
    
    
    <section id="lewy">
        <table>
        <tr>
            <th>HEX</th>
            <th>BIN</th>
            <th>DEC</th>
        </tr>
        <tr>
            <td>A</td>
            <td>1010</td>
            <td>10</td>
        </tr>
        <tr>
            <td>B</td>
            <td>1011</td>
            <td>11</td>
        </tr>
        <tr>
            <td>C</td>
            <td>1100</td>
            <td>12</td>
        </tr>
        <tr>
            <td>D</td>
            <td>1101</td>
            <td>13</td>
        </tr>
        <tr>
            <td>E</td>
            <td>1110</td>
            <td>14</td>
        </tr>
        <tr>
            <td>F</td>
            <td>1111</td>
            <td>15</td>
        </tr>
        </table>
    </section>


    <section id="srodek">
        <input type="number" id="liczba" placeholder="Wpisz liczbe dziesiętną">
        <button type="button" onclick="skrypt1()">Przelicz na binarny</button>
        <p id=wynik>Brak obliczeń</p>
    </section>


    <section id="prawy">
        <h2>Słowniczek</h2>
        <dl>
            <dt>Binarny</dt>
            <dd>pozycyjny system liczbowy, w którym podstawą jest liczba 2, a do zapisu liczb potrzebne są tylko dwie cyfry: 0 i 1. </dd>
            <dt>Decymalny</dt>
            <dd>pozycyjny system liczbowy, w którym podstawą jest liczba 10; do zapisu liczb stosuje się 10 cyfr: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9.</dd>
            <dt><a href="https://szesnastkowy_system_liczbowy.pl">Heksadecymalny</a></dt>
            <dd>pozycyjny system liczbowy, w którym podstawą jest liczba 16. Do zapisu liczb w tym systemie potrzebne jest szesnaście znaków.</dd>
        </dl>
    </section>


    <footer>
        <p>Stronę opracował:<em> Miłosz Łabędzki</em></p>
    </footer>
    <script>
        function skrypt1(){
            let liczba = document.querySelector("#liczba").value
            let binarny = ""
            let n = parseInt(liczba)
            while(n > 0){
                let reszta = n%2;
                binarny = reszta + binarny;
                n = Math.floor(n/2)
            }
            let sformatowanyWynik="";
            let licznikCofania=0;
            for(let i = binarny.length -1; i>=0; i--){
                sformatowanyWynik = binarny[i] +sformatowanyWynik;
                licznikCofania++;

                if(licznikCofania%4===0 && i !=0){
                    sformatowanyWynik = " " + sformatowanyWynik;
                }
            }
            document.querySelector("#wynik").innerHTML =sformatowanyWynik + "<sub>(2)</sub>";
        }
    </script>
</body>
</html>
