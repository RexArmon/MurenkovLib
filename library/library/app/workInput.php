<?php require_once('../data/connect.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Редактор произведений</title><!-- Разобраться с полем ввода -->
</head>
<body>   
    <div class="post">
        <h1>Добавить произведение</h1>
        <a href="main.php"><p>Главная</p></a>
        <div class="create-post">
            <form name="inputA" action="inputdata.php" method="post" class="pole" enctype="multipart/form-data">
                <textarea class="txta" name="work" placeholder="Написать сообщение..."></textarea>
                <select name="authors">
                    <?php
                        $sqli = "SELECT id, name_a FROM authors";
                        $name = $connect -> query($sqli);
                        while($author = mysqli_fetch_array($name)){
                            echo '<option>'.$author['name_a'].'</option>';
                        }
                    ?>
                </select>
                <div class="knopki">
                    <input class="but-send" type="submit" value="Отправить">
                </div>    
            </form>
        </div>
        <div class="box-posts">
        </div>
    </div>
</body>