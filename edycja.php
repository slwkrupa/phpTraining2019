<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    table{
        width: 800px;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #d4d4d4;
        border-spacing: 0px;
        text-align: center;
        margin-top: 45px;
        background-color: white;
    }
    th{
        background-color: #FB9F82;
        padding: 2px;
        border-bottom: 1.5px solid #F1F2F2;
        font-family: 'Raleway', sans-serif;
        color: white;
        font-size: 14px;
    }
    tr{
        height: 35px;
    }
    td{
        text-align: center;
        border-bottom: 1px solid #d4d4d4;
        font-family: 'Raleway', sans-serif;
        color: #949494;
        font-size: 0.95em;
        vertical-align: middle; /*wyrównanie w poziomie*/
    }
    .small{
        font-size: 10px;
        margin: 0px;
        text-indent: 10px;
        color: blue;
    }
    .dane{
        font-family: 'Raleway', sans-serif;
        color: #949494;
        font-size: 12px;
        font-weight: bold;
    }
    tr:hover td{
        background-color: #e3f8fc;
        border-right: #e3e3e3 solid 0.5px;
    }
    .edit td{
        color: red;
    }
    h3{
        background-color: white;
        padding: 10px;
        color: gray;
    }
</style>
<body>
    <h2>Edycja</h2>
<header>
    <div class="container">
        <ul>
            <li>
                <a href="index.php">Strona Główna</a>
            </li>
            <li>
                <a href="formularz.html">Rejestracja</a>
            </li>
            <li>
                <a href="listau.php">Uczestnicy</a> 
            </li>
            <li>
                <a href="edycja.php">Edycja danych</a>
            </li>
        </ul>
    </div>
</header>
<main>
    <table>
    <tr>
        <th>L.p.</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Email</th>
        <th>Nazwa kursu</th>
        <th>Rodo1</th>
        <th>Rodo2</th>
        <th>Edycja</th>
    </tr>

<?php
    $conn=mysqli_connect("localhost","root");

    $baza=mysqli_select_db($conn, "szkolenia");
    $query="SELECT imieu, nazwiskou, emailu, nazwa_kursu, zg1, zg2, id_kursu FROM kursy"; 
    mysqli_query($conn, "SET NAMES utf8");
    $results=mysqli_query($conn, $query);

    //sprawdzenie liczby iwerszy w zbiorze wyników
    $resNumber=mysqli_num_rows($results);
    //echo "Liczba wyników: <strong>".$resNumber."</strong><br/>";

    //pobranie wierszy ze zbioru wyników
    if($resNumber>0){
        $licznik=1;
        while($wiersz = mysqli_fetch_row($results)){
            echo "<tr>";
                echo "<td>".$licznik."</td><td>".$wiersz[0]."</td><td>".$wiersz[1]."</td><td>".$wiersz[2]."</td><td>".$wiersz[3]."</td><td>".$wiersz[4]."</td><td>".$wiersz[5]."</td>";
            echo "<td><style='color: blue;'><a href='formularz2.php?idk=$wiersz[6]'>Edytuj</a></td>";
            echo "</tr>";
            
            $licznik++;
        }
    }else{
        echo "<strong>BRAK WYNIKÓW ZAPYTANIA!</strong>";
    }

    mysqli_close($conn);
?>

</table>
</main>
<a href="index.php">Powrót do strony głównej</a>
</body>
</html>