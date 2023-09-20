<?php 
    require_once('connect.php');
    
    $id = htmlspecialchars($_GET['id']);
    
    $sqli = "SELECT id, name_a, image FROM authors WHERE id = '$id'";  
    $result = $connect -> query($sqli);

    $author = mysqli_fetch_array($result)
?>