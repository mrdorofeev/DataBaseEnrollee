<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg='';  

function createSession($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['firstName'] = $user['firstName'];
    if ($_SESSION['admin']){
        header('location: ' . BASE_URL . 'admin/applications/index.php');
    }
    else{
        header('location: ' . BASE_URL);
    } 
}

$enrollees = selectAll('enrollees');


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


//удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('enrollees', $id);
    header('location: ' . BASE_URL . 'admin/enrollees/index.php');
}


//редактирование пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $enrollee = selectOne('enrollees', ['id' => $_GET['edit_id']]);
    $id = $enrollee['id'];
    $firstName = $enrollee['firstName'];
    $email = $enrollee['email'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
    $newfirstName= trim($_POST['newfirstName']);
    $id = $_POST['id'];

    if (mb_strlen($newfirstName, 'UTF8') === 1) {
        $errMsg="Не бывает таких имён";
    }
    else if (mb_strlen($newfirstName, 'UTF8') === 0) {
        $errMsg="Остались незаполненные поля";
    }
    else {
        //закидываем только имя
        $userup = [
            'firstName' => $newfirstName
        ];
        $userup = update('enrollees', $id, $userup);
        header('location: ' . BASE_URL . 'admin/enrollees/index.php');
    }
}
else{
    
}
