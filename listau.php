<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    h3{
        background-color: white;
        padding: 10px;
        color: gray;
    }
</style>
<body>
    <h2>Lista uczestników</h2>
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
    <h3>Lista szkoleń oraz ich uczestników</h3>
    <?php
    $conn=mysqli_connect("localhost","root");

    $baza=mysqli_select_db($conn, "szkolenia");
    $query="SELECT DISTINCT nazwa_kursu FROM kursy"; 

    mysqli_query($conn, "SET NAMES utf8");
    $results=mysqli_query($conn, $query);
    
    echo "<ol>";
    while($wynik=mysqli_fetch_row($results)){
        echo "<li>".$wynik[0]."</li>";

        $query_user="SELECT imieu, nazwiskou FROM kursy WHERE nazwa_kursu='".$wynik[0]."'";
        $results_user=mysqli_query($conn, $query_user);
        
        echo "<ul>";
        while($wynik_user=mysqli_fetch_row($results_user)){
            echo "<li>".$wynik_user[0]." ".$wynik_user[1]." "."</li>";
        }
        echo "</ul>";
        echo "<br/>";
    }
    echo "</ol>";

    mysqli_close($conn);
?>
</main>
</body>
</html>