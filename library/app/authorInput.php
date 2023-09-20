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
        <h1>Добавить автора</h1>
        <a href="main.php"><p>Главная</p></a>
        <div class="create-post">
            <form name="pole-posta" action="inputdata.php" method="post" class="pole" enctype="multipart/form-data">
                <textarea class="polevvoda" name="author" placeholder="Написать сообщение..."></textarea>
                <input type="file" name="image" class="avatar-file">
                <div class="knopki">
                    <input class="but-send" type="submit" value="Отправить">
                </div>
            </form>
        </div>
        <div class="box-posts">
        </div>
    </div>
</body>