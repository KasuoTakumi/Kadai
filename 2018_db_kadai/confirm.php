<?php

session_start();

$html = file_get_contents("./confirm.html");


@$name = $_POST['name'];
@$mail = $_POST['mail'];
@$naiyou = $_POST['naiyou'];

$html = preg_replace('/{{name}}/', $name , $html);
$html = preg_replace('/{{mail}}/', $mail , $html);
$html = preg_replace('/{{naiyou}}/', $naiyou , $html);



$_SESSION['name'] = $name;
$_SESSION['mail'] = $mail;
$_SESSION['naiyou'] = $naiyou;


echo $html;