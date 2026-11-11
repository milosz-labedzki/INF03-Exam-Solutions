function licznik(){
    let liczba = localStorage.getItem('zliczenia')
    if(liczba === null){
        liczba = 0
    }
    liczba = Number(liczba) + 1

    localStorage.setItem('zliczenia',liczba)
    
    document.querySelector("#wynik").innerHTML=`Liczba wejść na stronę: ${liczba}`

}