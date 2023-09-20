<?php  
    $connect = mysqli_connect('localhost', 'root', '','library'); /* Объявляю переменную в котрой прописываю подключение к  mysqli */
    if(!$connect){
        die("Ошибка соединения");
    }
?>