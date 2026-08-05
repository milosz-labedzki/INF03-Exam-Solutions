<?php 
    $conn = mysqli_connect("localhost","root","","inf03_2022_06_03");
    if(isset($_POST['lowisko'])&& $_POST['lowisko']!=""){
    function skrypt1($conn){
        $lowisko = $_POST['lowisko'];
        $data = $_POST['data'];
        $sedzia  = $_POST['sedzia'];
        $zapytanie = "INSERT INTO `zawody_wedkarskie`(`Karty_wedkarskie_id`, `Lowisko_id`, `data_zawodow`, `sedzia`) VALUES ('0','$lowisko','$data','$sedzia');";
        $wynik = mysqli_query($conn,$zapytanie);

    }
    }
?>
<?php skrypt1($conn)?>
