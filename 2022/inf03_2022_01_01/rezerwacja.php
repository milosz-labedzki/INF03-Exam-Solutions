<?php
    echo "Dodano rezerwacje do bazy";
    $conn = mysqli_connect("localhost","root","","inf03_2022_01_01");
    if(!$conn){
        echo "nie udalo sie polaczyc z baza";
        return;
    }
    $data = $_POST['data'];
    $osoby=$_POST['osoby'];
    $telefon=$_POST['telefon'];
    $zapytanie = "INSERT INTO `rezerwacje`(`data_rez`, `liczba_osob`, `telefon`) VALUES ('$data','$osoby','$telefon');";
    $wynik = mysqli_query($conn,$zapytanie);
    mysqli_close($conn);

    
?>