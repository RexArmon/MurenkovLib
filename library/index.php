<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="styles/images/pin.ico">
		<link rel="stylesheet" type="text/css" href="styles/base.css">
		<link rel="stylesheet" type="text/css" href="styles/main.css">
		<title>Интернет-библиотека Владислава Муренкова: Главная</title>
    </head>
    <body>
        <div class="container">
            <!-- Шапка  -->
            <div class="head">
                <h1 class="head_h1"><a href="index.php"><?php require 'styles/head.php'?></a></h1>
            </div>
            <!-- Навигационный блок -->
            <div class="nav"></div>
            <!-- Новостная лента (Добавит чуть позже) -->
            <div class="posts">
                <h2 class="heading">Новости</h2>
                <p>Добавлены авторы:
                    <ln>Михаил Шолохов</ln>
                    <ln>Эрих Мария Ремарк</ln>
                </p>
            </div>
            <!-- Блок со списком авторов -->
            <div class="block-right">
                <a class="authors" href="authors.php"><h2>Авторы</h2></a>
                <div class="box_but">
                    <?php
                        require_once ('data/connect.php');
                        $sqli = 'SELECT id, name_a FROM authors';
                        $select = $connect -> query($sqli);

                        while($author = mysqli_fetch_array($select)){
                            echo
                            '<a href = "pages/author.php?id='.$author['id'].'">'
                                    .'<p class = "button_p">'.$author['name_a'].'</p>'.
                            '</a>';
                        }
                    ?>
                </div>
            </div>
            
            <!-- Блок с почтой создателя сайта и другой информацией -->
            <div class="basementx">
            <p class = "des">Email: vladislavmurenkov13@gmail.com | <a href="description.php">О библиотеке</a></p>
				<p class = "des">&copy;2022 - 2023 Владислав Муренков. Разработка и наполнение сайта.</p>
            </div>
        </div>
    </body>
</html>