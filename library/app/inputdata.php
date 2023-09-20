<?php
    require_once('../data/connect.php');

    $author = strip_tags($_POST['author']);
    $image = '../styles/images/' . time() . $_FILES['image']['name'];
    $type = strip_tags($_POST['types']);
    $work = strip_tags($_POST['works']);
    $book = strip_tags($_POST['books']);
    $part = strip_tags($_POST['parts']);
    $chapter = strip_tags($_POST['chapters']);
    $test = str_replace("'","\'",$_POST['ptext']);
    $text = nl2br($test);
    $authorS = strip_tags($_POST['authors']);
    move_uploaded_file($_FILES['image']['tmp_name'], '../'.$image);

    if($text){
        $sql = "INSERT INTO paragraphs (text) VALUES ('$text')";
        $connect -> query($sql);


            $sqlTx = "SELECT id, text FROM paragraphs WHERE text = '$text'";   //Вывод данных из таблицы paragraphs 
            $name_tx = $connect -> query($sqlTx);
            $name_Tx = mysqli_fetch_array($name_tx);
            $idTx = $name_Tx['id'];
            echo $idTx;

            $sqlT = "SELECT id, type FROM types WHERE type = '$type'";   //Вывод данных из таблицы types 
            $name_t = $connect -> query($sqlT);
            $name_T = mysqli_fetch_array($name_t);
            $idT = $name_T['id'];
            echo $idT;
            
            $sqlW = "SELECT id, name_c FROM compositions WHERE name_c = '$work'";     //Вывод данных из таблицы compostions
            $name_w = $connect -> query($sqlW);
            $name_W = mysqli_fetch_array($name_w);
            $idW = $name_W['id'];
            echo $idW;

            $sqlB = "SELECT id, book FROM books WHERE book = '$book'";     //Вывод данных из таблицы books
            $name_b = $connect -> query($sqlB);
            $name_B = mysqli_fetch_array($name_b);
            $idB = $name_B['id'];
            echo $idB;

            $sqlP = "SELECT id, part FROM parts WHERE part = '$part'";     //Вывод данных из таблицы parts
            $name_p = $connect -> query($sqlP);
            $name_P = mysqli_fetch_array($name_p);
            $idP = $name_P['id'];
            echo $idP;
            
            $sqlC = "SELECT id, chapter FROM chapters WHERE chapter = '$chapter'";     //Вывод данных из таблицы chapters
            $name_c = $connect -> query($sqlC);
            $name_C = mysqli_fetch_array($name_c);
            $idC = $name_C['id'];
            echo $idC;
            
            $sqlTC = "INSERT INTO text_in_composition (type_id ,composition_id, book_id, part_id, chapter_id, paragraph_id) VALUES ('$idT', '$idW', '$idB', '$idP', '$idC', '$idTx')";    // Добавление данных в таблицу произведений авторов
            $connect -> query($sqlTC);
            header("Location: textInput.php");
        

        
    }else{
        if($work){
            $sqlWI = "INSERT INTO compositions (name_c) VALUES ('$work')"; // Добавления данных в таблицу произведений
            $connect -> query($sqlWI);

            $sqlW = "SELECT id, name_c FROM compositions 
                    WHERE name_c = '$work'";    //Вывод данных из таблицы произведений 
            $name_w = $connect -> query($sqlW);
            $name_W = mysqli_fetch_array($name_w);
            $idW = $name_W['id'];
            echo $idW;

            $sqlA = "SELECT id, name_a FROM authors
                    WHERE name_a = '$authorS'"; //Вывод данных из таблицы авторов
            $name_a = $connect -> query($sqlA);
            $name_A = mysqli_fetch_array($name_a);
            $idA = $name_A['id'];
            echo $idA;
            
            $sqlWA = "INSERT INTO composition_in_author (author_id, composition_id) VALUES ('$idA','$idW')";    // Добавление данных в таблицу произведений авторов
            $connect -> query($sqlWA);
            header("Location: workInput.php");
        }else{
            $sql = "INSERT INTO authors (name_a, image) VALUES ('$author', '$image')";  //Добавление данных в таблицу авторов
            $connect -> query($sql);
            header("Location: authorInput.php");
        }
    }
