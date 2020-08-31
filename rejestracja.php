<?php
    $conn=mysqli_connect("localhost","root");

    $baza=mysqli_select_db($conn, "szkolenia");
    $query="INSERT INTO kursy VALUES(null, '".$_POST['imie']."','".$_POST['nazwisko']."','".$_POST['email']."','".$_POST['lista']."'"; 

    if(isset($_POST['chbx1'])){
        $query=$query.",".$_POST['chbx1']."";
    }else{
        $query=$query.", null";
    }

    if(isset($_POST['chbx2'])){
        $query=$query.",".$_POST['chbx2'].")";
    }else{
        $query=$query.", null)";
    }
    //polskie znaki
    mysqli_query($conn, "SET NAMES utf8");
    $results=mysqli_query($conn, $query);
    if($results){
        
    }

    mysqli_close($conn);
?>
<a href="index.php">Powrót do strony głównej</a>



                