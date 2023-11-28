<?php
    require_once ('../data/select.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../styles/base.css">
		<link rel="icon" type="image/x-icon" href="../styles/images/pin.ico">
		<link rel="stylesheet" type="text/css" href="../styles/author.css">
		<title>Интернет-библиотека Владислава Муренкова: <?php echo $author['name_a']?></title>
    </head>
    <body>
        <div class="container">
            <!-- Шапка  -->
            <div class="head">
                <h1 class="head_h1"><a href="../index.php"><?php require '../styles/head.php'?></a></h1>
            </div>
            <!-- Блок навигации -->
            <div class="nav">
                <h2 class="name_author"><?php echo $author['name_a']?></h2>
                <img class="image" src="../<?php echo $author['image']?>">
                <div class="box_but">
                    <a href="../index.php"><p class="button_p">Главная</p></a>
                </div>
            </div>
            <!-- Блок с биографией автора -->
            <div class="text">
                <div class="text_a">
                    <h2 class="h2">Об авторе</h2>
                    <p class="bio_text"><?php 
                        require_once ('../data/select_bio.php');
                        while($author= mysqli_fetch_array($result)){

                            echo '<p class= "bio_text">'.$author['text'].'</p>';
                        }
                    ?></p>
                </div>
            </div>
            <!-- Блок со списком работ -->
            <div class="works">
                <h2 class="br_h2">Произведения</h2>
                <div class="box_but">
                    <?php
                        require_once ('../data/select_works.php');
                        while($work= mysqli_fetch_array($res_w)){
                            echo
                            '<a href="work.php?id='.$work['id'].'"class="works_a">'.
                                '<p class= "button_p">'.$work['name_c'].'</p>'.
                            '</a>';
                        }
                    ?>
                </div>
            </div>
            <!-- Подвал -->
            <div class="basementx">
                <p class = "des">Email: vladislavmurenkov13@gmail.com | <a href="description.php">О библиотеке</a></p>
				<p class = "des">&copy;2022 - 2023 Владислав Муренков. Разработка и наполнение сайта.</p>
            </div>
        </div>
    </body>
</html>