<?php

session_start();

$html = file_get_contents("./regist.html");

include_once('./function.php');

$name = $_SESSION['name'];
$mail = $_SESSION['mail'];
$naiyou = $_SESSION['naiyou'];

//DBに登録
add_db_datas($name, $mail, $naiyou);

echo $html;