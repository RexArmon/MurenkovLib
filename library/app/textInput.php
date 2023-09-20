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
        <h1>Добавить текст</h1>
        <p>** - Отступ между абзацами. Если в главах между абзацами есть отступ, то прописывайте между ними данный набор символов.</p> 
        <a href="main.php"><p>Главная</p></a>
        <div class="textarea">
            <form name="pole-posta" action="inputdata.php" method="post" class="pole" enctype="multipart/form-data">
                <label>Тип текста
                    <select name="types">
                            <?php
                                $sqli = "SELECT id, type FROM types";
                                $name = $connect -> query($sqli);
                                while($author = mysqli_fetch_array($name)){
                                    echo '<option>'.$author['type'].'</option>';
                                }
                            ?>
                    </select>
                </label>
                <br>
                <label>Произведение
                    <select name="works">
                        <?php
                            $sqli = "SELECT id, name_c FROM compositions";
                            $name = $connect -> query($sqli);
                            while($author = mysqli_fetch_array($name)){
                                echo '<option>'.$author['name_c'].'</option>';
                            }
                        ?>
                    </select>
                </label>
                <br>
                <label> Книга
                    <select name="books">
                        <?php
                            $sqli = "SELECT id, book FROM books";
                            $name = $connect -> query($sqli);
                            while($author = mysqli_fetch_array($name)){
                                echo '<option>'.$author['book'].'</option>';
                            }
                        ?>
                    </select>
                </label>
                <br>
                <label>Часть
                    <select name="parts">
                        <?php
                            $sqli = "SELECT id, part FROM parts";
                            $name = $connect -> query($sqli);
                            while($author = mysqli_fetch_array($name)){
                                echo '<option>'.$author['part'].'</option>';
                            }
                        ?>
                    </select>
                </label>
                <br>
                <label>Глава
                    <select name="chapters">
                        <?php
                            $sqli = "SELECT id, chapter FROM chapters";
                            $name = $connect -> query($sqli);
                            while($author = mysqli_fetch_array($name)){
                                echo '<option>'.$author['chapter'].'</option>';
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
        <div class="box-posts">
                    <?php 
                    // $text = "SELECT  avatar, name, login, text, time FROM users INNER JOIN posts ON users.id = posts.id_sender ORDER BY posts.id DESC";
                    // $result = $connect -> query($text);
                    // while ($r= mysqli_fetch_array($result)){
                    //     if($r['name']){
                    //         echo
                    //         '<div class = "user-posts">'
                    //             .'<img class="avatar-post" src="' . $r['avatar'] . '" width="40" height="40">'
                    //             .'<p class = "name-post">'.$r['name'].'</p>'
                    //             .'<p class = "time-post">'.$r['time'].'</p>'
                    //             .'<p class = "text-post">' . $r['text'] . '</p>
                    //         </div>';
                    //     }else{
                    //         echo
                    //         '<div class = "user-posts">'
                    //             .'<img class="avatar-post" src="' . $r['avatar'] . '" width="40" height="40">'
                    //             .'<p class = "login-post">' . $r['login'].'</p>'
                    //             .'<p class = "time-post">' . $r['time'].'</p>'
                    //             .'<p class = "text-post">' . $r['text'] .'</p>
                    //         </div>';
                    //     }
                    // }
                ?>
        </div>
    </div>
</body>