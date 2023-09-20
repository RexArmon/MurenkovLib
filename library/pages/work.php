<?php


    require_once ('data/select_work.php');
    require_once ('data/select_text.php');
    require_once('data/connect.php');

    $work = mysqli_fetch_array($res_w);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="../styles/images/pin.ico">
		<link rel="stylesheet" type="text/css" href="../styles/base.css">
		<link rel="stylesheet" type="text/css" href="../styles/work.css">
		<title>Интернет-библиотека Владислава Муренкова:
            <?php 
                echo $work['name_a'] . ": " . $work['name_c'];    
            ?>
        </title>
    </head>
    <body>
        <div class="container">
            <!-- Шапка  -->
            <div class="head">
                <div>
                    <h1 class="head_h1"><a href="main.php">Интернет-библиотека Владислава Муренкова</a></h1>
                </div>
            </div>
            <!-- Блок навигации -->
            <div class="nav">
                <h2 class="name_author"><?php echo $work['name_a']?></h2>
                <img class="image" src="<?php echo $work['image']?>">
                <div class="box_but">
                    <?php 
                        
                        $id = $_GET['id'];
                                
                        $sqlia = "SELECT author_id FROM composition_in_author WHERE composition_id = '$id'"; 
                        $res_at = $connect -> query($sqlia);
                        
                        $a = mysqli_fetch_array($res_at);

                    ?>
                    <a class="button_a" href="author.php?id=
                        <?php 
                            echo $a['author_id'];
                        ?>
                    "><p class="button_p">Биография</p></a>
                    <a class="button_a" href="authors.php"><p class="button_p">Авторы</p></a>
                    <a href="main.php"><p class="button_p">Главная</p></a>
                </div>
            </div>
            <!-- Блок c содержанием -->
            <div class="block-right">
                <h2 class="br_h2">Содержание</h2>
                <div class="box_but">
                        <?php
                            require_once ('data/connect.php');
                            
                            $id = htmlspecialchars($_GET['id']);
    
                            $sqli = "SELECT text_in_composition.id, text_in_composition.composition_id, compositions.name_c, chapters.chapter, paragraphs.text FROM text_in_composition 
                                    INNER JOIN chapters ON text_in_composition.chapter_id = chapters.id
                                    INNER JOIN compositions ON text_in_composition.composition_id = compositions.id 
                                    INNER JOIN paragraphs ON text_in_composition.paragraph_id = paragraphs.id 
                                    WHERE compositions.id = '$id'"; 
                            $rt = $connect -> query($sqli);

                            $ch1 = 0;
                            while($cha = mysqli_fetch_array($rt)){
                                if($ch1 != $cha['chapter']){
                                    $finde = 'Глава';
                                    $pos = strpos( $cha['chapter'], $finde);
                                    if($pos === false){
                                        echo '
                                            <a href="#'.$cha['chapter'].'" class = "work_a">
                                                <p class = "button_p">Глава '.$cha['chapter'].'</p>
                                            </a>';
                                            $ch1 = $cha['chapter'];
                                    }else{
                                        echo '
                                            <a href="#'.$cha['chapter'].'" class = "work_a">
                                                <p class = "button_p">'.$cha['chapter'].'</p>
                                            </a>';
                                            $ch1 = $cha['chapter'];
                                    }
                                    
                            }
                            }
                        ?>
                </div>
            </div>
            <!-- Подвал -->
            <div class="basementx">
                <p class = "des">Email: vladislavmurenkov13@gmail.com | <a href="description.php">О библиотеке</a></p>
				<p class = "des">&copy;2022 - 2023 Владислав Муренков. Разработка и наполнение сайта.</p>
            </div>
            <!-- Блок с текстом -->
            <div class="text">
                <div class = "text_c">
                    <h2 class="work_n"><?php echo $work['name_c']?></h2>
                        <?php 
                            $ch = 0;
                            $s = 1;
                            while($text = mysqli_fetch_array($res_t)){
                                if($text['chapter'] == 0){  // Вывод эпиграфа
                                    echo '<p class = "br"></p>';
                                        echo '<div class = "epigraph">';
                                            echo '<p>'.$text['text'].'</p>';
                                        echo '</div>';
                                    echo '<p class = "br"></p>';
                                }else{
                                    if($ch != $text['chapter']){    // Вывод глав 
                                        echo '<h3 class="text_ch" id="'.$text['chapter'].'">'.$text['chapter'].'</h3>';
                                        $ch = $text['chapter'];
                                    }
                                    if($ch = $text['chapter']){ // Вывод текста
                                        if($text['type_id'] == 1){
                                            $array = explode('<br />', $text['text']);
                                        
                                            for ($n = 0; $n < count($array); $n++){ //вывод текста
                                                $way = str_replace('**','<p class = "br"></p>', $array[$n]);
                                                echo '<p class = "text_p">' . $way . "</p>";
                                            }
                                            echo '<p class = "br"> </p>';
                                        }else{
                                            echo '<div class = "poem">';
                                                $array = explode('<br />', $text['text']);
                                            
                                                for ($n = 0; $n < count($array); $n++){ //вывод текста
                                                    $way = str_replace('**','<p class = "br"></p>', $array[$n]);
                                                    echo '<pre class = "text_pre">' . $way . "</pre>";
                                                }
                                            echo '</div>';
                                            echo '<p class = "br"></p>';
                                        }
                                    }else{                      // Вывод текста
                                        $array = explode('<br />', $text['text']);
                                        for ($n = 0; $n < count($array); $n++){
                                            $way = str_replace('**','<p class = "br"></p>', $array[$n]);
                                            echo '<p class = "text_p">' . $way . "</p>";
                                        }
                                    }
                                }
                            }
                        ?>
                </div>
            </div>
        </div>
    </body>
</html>