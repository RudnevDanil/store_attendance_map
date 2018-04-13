<?php
    $serever_adres = 'localhost';
    $dbuser = 'z92876se__base';
    $dbpassword = 'HeL1UVYS';
    $dbname = 'z92876se__base';
    $address_site = "http://z92876se.beget.tech/";
    $connection = mysqli_connect($serever_adres,$dbuser,$dbpassword,$dbname);//сервер, имя пользователя, пароль, название БД
    if($connection == false) //ошибка подключения
    {
        echo 'db connect error!    ';
        echo mysqli_connect_error();//выведет ошибку
        exit();//убиваем скрипт
    }
?>