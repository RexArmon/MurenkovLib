<?php 
    require_once('connect.php');
    
    $id = htmlspecialchars($_GET['id']);
    
    $sqli = "SELECT composition_in_author.id, authors.name_a, compositions.name_c, compositions.id FROM composition_in_author 
                INNER JOIN authors ON composition_in_author.author_id = authors.id
                INNER JOIN compositions ON composition_in_author.composition_id = compositions.id WHERE authors.id = '$id'"; 
    $res_w = $connect -> query($sqli);
?>