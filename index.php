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
    <h2>Strona główna</h2>
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
    <h3>Statystyki szkoleń</h3>
    <?php
        $conn=mysqli_connect("localhost","root");

        $baza=mysqli_select_db($conn, "szkolenia");
        $query="SELECT nazwa_kursu, COUNT(id_kursu) FROM kursy GROUP BY nazwa_kursu"; 
        $results=mysqli_query($conn, $query);
        echo "<ol>";
        while($wynik=mysqli_fetch_row($results)){
            echo "<li>".$wynik[0].": ".$wynik[1]." uczestników</li>";
        }
        echo "</ol>";
        mysqli_close($conn);
    ?>
</main>
</body>
</html>