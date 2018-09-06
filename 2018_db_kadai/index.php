<?php

session_start();

$html = file_get_contents("./index.html");

@$name = $_SESSION['name'];
@$mail = $_SESSION['mail'];
@$naiyou = $_SESSION['naiyou'];


$html = preg_replace('/{{name}}/', $name , $html);
$html = preg_replace('/{{mail}}/', $mail , $html);
$html = preg_replace('/{{naiyou}}/', $naiyou , $html);


echo $html;