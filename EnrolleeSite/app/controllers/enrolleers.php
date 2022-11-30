<?php
include "app/database/db.php";

$errMsg='';


function createSession($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['firstName'] = $user['firstName'];
    if ($_SESSION['admin']){
        header('location: ' . BASE_URL . 'admin/admin.php');
    }
    else{
        header('location: ' . BASE_URL);
    } 
}


//форма регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin = 0;
    $firstName = trim($_POST['firstName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordCheck = trim($_POST['passwordCheck']);

    if ($firstName==='' || $email ==='' || $password ==='') {
        $errMsg="Не все поля заполнены!";
    }
    else if(mb_strlen($firstName, 'UTF8')<2){
        $errMsg="Не бывает таких имён"; 
    }
    else if($password !== $passwordCheck){
        $errMsg="Пароли не совпадают"; 
    }
    else{
        $existence = selectOne('enrollees', ['email' => $email]);
        if($existence['email'] === $email) {
            $errMsg="Пользователь с таким email уже зарегистрирован"; 
        }
        else {
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $post = [
                'firstName' => $firstName,
                'email' => $email,
                'admin' => $admin,
                'password' => $passwordhash
            ];
            $id = insert('enrollees', $post);
            $user = selectOne('enrollees', ['id' => $id]);

            createSession($user);         
        }
    }     
}
else{
    $firstName = '';
    $email = '';
}



//форма авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-auth'])){
    $emailAuth = trim($_POST['emailAuth']);
    $passwordAuth= trim($_POST['passwordAuth']);

    if ($emailAuth === '' || $passwordAuth === '') {
        $errMsg="Не все поля заполнены!";
    }
    else{
        $existence = selectOne('enrollees', ['email' => $emailAuth]);
        if ($existence && password_verify($passwordAuth, $existence['password'])){
            createSession($existence);
        }
        else{
            $errMsg = "Проверьте данные!";
        }
    }
}
else{
    $emailAuth = '';
}