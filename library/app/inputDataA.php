<?php    
    require_once('../data/connect.php');

    $texT = str_replace("'","\'",$_POST['ptext']);
    $text = nl2br($texT);
    $author = strip_tags($_POST['authors']);

    $sql = "INSERT INTO paragraphs (text) VALUES ('$text')";
    $connect -> query($sql);

    $sqlA = "SELECT id, name_a FROM authors WHERE name_a = '$author'";   //Вывод данных из таблицы authors 
    $row_a = $connect -> query($sqlA);
    $row_A = mysqli_fetch_array($row_a);
    $idA = $row_A['id'];

    $sqlTx = "SELECT id, text FROM paragraphs WHERE text = '$text'";   //Вывод данных из таблицы paragraphs 
    $row_tx = $connect -> query($sqlTx);
    $row_Tx = mysqli_fetch_array($row_tx);
    $idTx = $row_Tx['id'];

    $sqlTA = "INSERT INTO text_in_author (author_id, text_id) VALUES ('$idA', '$idTx')";
    $connect -> query($sqlTA);

    header('Location: textAuthorInput.php');