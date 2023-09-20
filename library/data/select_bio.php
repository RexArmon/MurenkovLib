<?php 
    require_once('connect.php');
    
    $id = htmlspecialchars($_GET['id']);
    
    $sqli = "SELECT text_in_author.id, authors.name_a, authors.image, paragraphs.text FROM text_in_author 
                INNER JOIN authors ON text_in_author.author_id = authors.id
                INNER JOIN paragraphs ON text_in_author.text_id = paragraphs.id WHERE authors.id = '$id'"; 
    $result = $connect -> query($sqli);

?>