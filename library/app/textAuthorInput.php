<?php require_once('../data/connect.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="text.css">
  <title>Редактор произведений</title><!-- Разобраться с полем ввода -->
</head>
<body>   
    <div class="container">
        <h1>Добавить текст автора</h1>
        <p>** - Отступ между абзацами. Если в главах между абзацами есть отступ, то прописывайте между ними данный набор символов.</p> 
        <a href="main.php"><p>Главная</p></a>
        <div class="textarea">
            <form name="pole-posta" action="inputDataA.php" method="post" class="pole" enctype="multipart/form-data">
                <label>Автор
                    <select name="authors">
                        <?php
                            $sqli = "SELECT id, name_a FROM authors";
                            $name = $connect -> query($sqli);
                            while($author = mysqli_fetch_array($name)){
                                echo '<option>'.$author['name_a'].'</option>';
                            }
                        ?>
                    </select>
                </label>
                <br>
                <textarea id="ptext"  class="texta" name="ptext" placeholder="Написать сообщение..."></textarea>
                <br>
                <input class="but-send" type="submit" value="Отправить">
            </form>
        </div>
    </div>
</body>