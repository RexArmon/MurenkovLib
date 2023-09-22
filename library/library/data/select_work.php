<?php 
    require_once('data/connect.php');
    
    $id = htmlspecialchars($_GET['id']);
    
    $sqli = "SELECT composition_in_author.id, authors.name_a, authors.image, authors.id, compositions.name_c FROM composition_in_author 
                INNER JOIN authors ON composition_in_author.author_id = authors.id
                INNER JOIN compositions ON composition_in_author.composition_id = compositions.id WHERE compositions.id = '$id'"; 
    $res_w = $connect -> query($sqli);
    
    
?>