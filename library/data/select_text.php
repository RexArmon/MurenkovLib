<?php 
    require_once('data/connect.php');
    
    $id = htmlspecialchars($_GET['id']);
    
    $sqli = "SELECT text_in_composition.id, text_in_composition.type_id, text_in_composition.composition_id, compositions.name_c, chapters.chapter, paragraphs.text FROM text_in_composition 
            INNER JOIN chapters ON text_in_composition.chapter_id = chapters.id
            INNER JOIN compositions ON text_in_composition.composition_id = compositions.id 
            INNER JOIN paragraphs ON text_in_composition.paragraph_id = paragraphs.id 
            WHERE compositions.id = '$id'"; 
    $res_t = $connect -> query($sqli);
?>