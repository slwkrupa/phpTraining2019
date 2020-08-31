<?php
    $conn=mysqli_connect("localhost","root");

    $baza=mysqli_select_db($conn, "szkolenia");
    $query="UPDATE kursy SET imieu='".$_POST['imie']."', nazwiskou='".$_POST['nazwisko']."', emailu='".$_POST['email']."', nazwa_kursu='".$_POST['lista']."'"; 
   
        if(isset($_POST['chbx1'])){
            $query=$query.",zg1=".$_POST['chbx1']."";
        }else{
            $query=$query."zg1= null";
        }
        if(isset($_POST['chbx2'])){
            $query=$query.",zg2=".$_POST['chbx2']."";
        }else{
            $query=$query."zg2= null";
        }

        $query=$query." WHERE id_kursu=".$_POST['hid']."";
    mysqli_query($conn, "SET NAMES utf8");
    $results=mysqli_query($conn, $query);
    mysqli_close($conn);
?>
<a href="index.php">Powrót do strony głównej</a>