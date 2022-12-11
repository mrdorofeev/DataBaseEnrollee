<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION){
    header('location: ' . BASE_URL . 'auth.php'); 
}


$applications = selectAllApplications();

//удаление заявки админом
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){

                                    //таблица, имя первой колонки, имя второй колонки, интересующий id из первой колонки, интересующий id из второй колонки
    deleteFromTableWithCompositeKey('program_enrollee',
                                    'program_id', 'enrollee_id',
                                    $applications[$_GET['del_id']]['program_id'], $applications[$_GET['del_id']]['enrollee_id']);
    header('location: ' . BASE_URL . 'admin/applications/index.php');
}


