<?php
// ver K_1.0.1

//dsn
function get_dsn(){
    
    //初期化
    static $dsn = null;
    //すでに読み込んでいる場合には処理をスキップ
    if ($dsn === null) {
        //MySQL Login information
        $db_user = "root";
        $db_pass = "";
        $db_host = "localhost";
        $db_name = "form_test";
        $db_type = "mysql";
        
        //データソースネームを使って接続
        $dsn = new PDO("$db_type:hots=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    }
    return $dsn;
}


//db登録
function add_db_datas($name, $mail, $naiyou){

    $dsn = get_dsn();

    $add_sql = $dsn->prepare('INSERT INTO `form`(`name`, `mail`, `naiyou`) VALUES (:name, :mail, :naiyou)');
    $add_sql->bindValue(':name', $name);
    $add_sql->bindValue(':mail', $mail);
    $add_sql->bindValue(':naiyou', $naiyou);
    $add_sql->execute();


}

//dbからデータを取得
function get_db_datas(){

    $dsn = get_dsn();

    $get_datas = $dsn->prepare('SELECT name, mail, naiyou, timestamp FROM form');
    $get_datas->execute();
    $data = $get_datas->fetchAll(PDO::FETCH_ASSOC);

    $count = count($data);

    //初期化
    $html = '';

    for($i=0; $i<$count;$i++){

        $html = $html.'
        <tr>
            <td>'.$data[$i]["timestamp"].'</th>
            <td>'.$data[$i]["name"].'</th>
            <td>'.$data[$i]["mail"].'</th>
            <td>'.$data[$i]["naiyou"].'</th>
        </tr>
        ';
        
    }
    return $html;
}