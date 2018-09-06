<?php

include_once('./function.php');

$html = file_get_contents('./kanri.html');

$table_data = get_db_datas();

$html = preg_replace('/{{datas}}/', $table_data , $html);

echo $html;