<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>Ćwiczenie piąte</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<style>
    h3{
        background-color: white;
        padding: 10px;
        color: gray;
    }
    .inputs{
        width: 100px;
        font-size: 0.85em;
        background-color:#FB9F82;
        color: white;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        padding: 20px;
    }
    label{
        font-size: 20px;
    }
    input[type="text"]{
        border: none;
        text-align: center;
        font-size: 20px;
        color: lightgrey;
    }
    img{
        width: 20px;
        height: 20px;
    }
    fieldset{
        display: block;
        border: none;
        outline: none;
    }
    .chkb{
        text-align: justify;
    }
    p.hint{
        position: relative;
        display: block;
        bottom: 50px;
        left: 280px;
        width: 300px;
        background-color: #F85C50;
        color: white;
        display: block;
        padding: 5px;
        margin-left: 10px;
        visibility: hidden;
    }
    img:hover + p.hint{
        visibility: visible;
    }
    input[type="reset"],
    input[type="submit"]{
        color: white;
        font-size: 25px;
        background-color: #FB9F82;
        border: none;
        padding: 15px;
        cursor: pointer;
    }
</style>
<body class="user_form">

<h2>Formularz</h2>
<header>
    <?php
        $conn=mysqli_connect("localhost","root");

        $baza=mysqli_select_db($conn, "szkolenia");
        $query="SELECT imieu, nazwiskou, emailu, nazwa_kursu, zg1, zg2, id_kursu FROM kursy WHERE id_kursu='".$_GET['idk']."'"; 
        mysqli_query($conn, "SET NAMES utf8");
        $results=mysqli_query($conn, $query);

        $wiersz = mysqli_fetch_row($results);

        //mysqli_close($conn);
    ?>
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
    <div>
        <form method="POST" action="edycja_uczestnika.php">
            <fieldset class="inputs">
                <label>Imię uczestnika:</label><br/>
                <input type="text" required autocomplete="off" name="imie" placeholder="Podaj imię" value="<?php echo $wiersz[0]?>">
                <img src="quest.png">
                <p class="hint">W to miejsce proszę wpisać swoje imię</p>

                <label>Nazwisko uczestnika:</label><br/>
                <input type="text" required autocomplete="off" name="nazwisko" placeholder="Podaj nazwisko" value="<?php echo $wiersz[1]?>">
                <img src="quest.png">
                <p class="hint">W to miejsce proszę wpisać nazwisko</p>

                <label>Email uczestnika:</label><br/>
                <input type="text" required autocomplete="off" name="email" placeholder="Podaj email" value="<?php echo $wiersz[2]?>">
                <img src="quest.png">
                <p class="hint">Proszę wpisać maila w poprawnej formie</p>

                <label>Wybór szkolenia:</label><br/>
                <select name="lista">
                <?php
                switch($wiersz[3]){
                    case 'Python poziom podstawowy':
                        echo "
                        <option selected>Python poziom podstawowy</option>
                        <option>Python poziom zaawansowany</option>
                        <option>JQuery oraz Ajax</option>
                        <option>SQL dla serwera ORACLE</option>
                        ";
                        break;

                    case 'Python poziom zaawansowan':
                        echo "
                        <option>Python poziom podstawowy</option>
                        <option selected>Python poziom zaawansowany</option>
                        <option>JQuery oraz Ajax</option>
                        <option>SQL dla serwera ORACLE</option>
                        ";
                        break;

                    case 'JQuery oraz Ajax':
                        echo "
                        <option>Python poziom podstawowy</option>
                        <option>Python poziom zaawansowany</option>
                        <option selected>JQuery oraz Ajax</option>
                        <option>SQL dla serwera ORACLE</option>
                        ";
                        break;

                    case 'SQL dla serwera ORACLE':
                        echo "
                        <option>Python poziom podstawowy</option>
                        <option>Python poziom zaawansowany</option>
                        <option>JQuery oraz Ajax</option>
                        <option selected>SQL dla serwera ORACLE</option>
                        ";
                        break;
                } 
                ?>
                </select>
            </fieldset>
            <fieldset class="chkb">
                <p><input type="checkbox" id="chbx1" value="1" name="chbx1" <?php if($wiersz[4]==1){echo "checked";}?>>
                Wyrażam zgodę na otrzymywanie od <span>INFO-SOFT</span>
                i innych podmiotów z Grupy komunikacji marketingowej, której celem
                jest w szczególności promcoja szkoleń oferowanych przez te podmioty
                przy wykrozystaniu moich danych.</p>
            </fieldset>
            <fieldset class="chkb">
                <p><input type="checkbox" id="chbx2" value="1" name="chbx2" <?php if($wiersz[5]==1){echo "checked";}?>>
                Wyrażam wobec firmy <span>INFO-SOFT</span> oraz innych podmiotów z Grupy
                <span>SOFT</span> zgodę na przetwarzanie w celach marketingowych, w tym
                poprzez progilowanie, moich danych osobowych w trakcie zamawiania kursu/szkolenia.</p>
            </fieldset>
            <fieldset>
                <input type="hidden" name="hid" value="<?php echo $_GET['idk']?>">
                <input type="reset" value="Reset" class="button">
                <input type="submit" name="sbm" value="Wyślij" class="button">
            </fieldset>
        </form>   
    </div>
</body>