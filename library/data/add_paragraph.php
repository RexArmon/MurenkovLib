<?php
  require_once('connect.php');


  $sqli = "INSERT paragraphs (text) VALUES ('$text')";
  $result = $connect -> query($sqli);

  $sqli = "SELECT id, text FROM paragraphs WHERE id = (SELECT MAX(id) FROM paragraphs)";
  $select = $connect -> query($sqli);
  $r = mysqli_fetch_array($select);
  
  $text = "INSERT texts (id, paragraph_id) VALUES ('', '$r[id]')";
  $result = $connect -> query($text);
  header('Location: ../main.php')
?>