<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION){
    header('location: ' . BASE_URL . 'auth.php'); 
}

$errMsg = '';

// форма создания заявки 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applic-create'])){
    tt($_POST);
    $op_id = trim($_POST['oplist']);
    

    if ($op_id==='') {
        $errMsg="Выбери образовательную программу";
    }
    //else if(){} проверка на наличие такой заявки у пользователя
    else{
        $existence = selectOne('programs', ['id' => $op_id]);
        if($existence['id'] === $op_id) {
            $errMsg="Вы уже подали заявку на данную образовательную программу"; 
        }
        else {
            //вносим заявку в базу        
        }
    }     
}
else{

}