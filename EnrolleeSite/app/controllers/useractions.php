<?php

include SITE_ROOT . "/app/database/db.php";
if (!$_SESSION){
    header('location: ' . BASE_URL . 'auth.php'); 
}

$subjects = selectAll('subjects');
$added_subjects = getUserExams($_SESSION['id']);
$programs = selectAll('programs');
$submitted_applications = getUserApplications($_SESSION['id']);

$errMsg='';


//добавление экзамена пользователем
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-subject'])){
    $result = trim($_POST['result']);
    $subject_id = trim($_POST['sub-list']);

    if (!$subject_id) {
        $errMsg = 'НУЖНО ВЫБРАТЬ ПРЕДМЕТ';
    }
    else if ($result < 0 || $result > 100 || !is_numeric($result)) {
        $errMsg = 'НЕКОРРЕКТНЫЕ ДАННЫЕ В ПОЛЕ БАЛЛЫ';
    }
    else{
        $flag = false;
        foreach ($added_subjects as $key => $addedsubject) {
            if ($addedsubject['subject_id'] == $subject_id) {
                $flag = true;
                break;
            }
        }
        
        if ($flag){
            $errMsg = 'Вы уже добавляли этот предмет';
        }
        else {
            $addsubject = [
                'result' => $result,
                'enrollee_id' => $_SESSION['id'],
                'subject_id' => $subject_id
            ];
            insert('enrollee_subject', $addsubject);
            header('location: ' . BASE_URL . 'user/exams/index.php');
        }
    }
}


//удаление экзамена пользователем
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_name'])){
    $params = [
        'name_subject' => $_GET['del_name']
    ];
    $del_name = selectOne('subjects', $params);
    deleteExamByUser($_SESSION['id'], $del_name['id']);
    header('location: ' . BASE_URL . 'user/exams/index.php');
}


//добавление заявки пользователем
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applic-create'])){

    $op_id = trim($_POST['oplist']);

    if ($op_id==='') {
        $errMsg="Выбери образовательную программу";
    }
    else{
        $params = [
            'enrollee_id' => $_SESSION['id'],
            'program_id' => $op_id
        ];

        if(selectOne('program_enrollee', $params)) { //проверка на наличие такой заявки
            $errMsg="Вы уже подавали заявку на данную образовательную программу"; 
        }
        else {
            $requiredExams = getSubjectsForProgram($op_id);

            //проверяем всё ли сдал и на достаточное ли количество баллов абитуриент
            $amount = count($requiredExams); //сколько нужно экзаменов
            foreach ($requiredExams as $key1 => $requiredExam){
                $flag = false; //предполагаем, что абитуриент очередной экзамен не сдавал
                foreach ($added_subjects as $key2 => $added_subject) { //начинаем искать экзамен
                    if ($requiredExam['id'] === $added_subject['subject_id']){ //если нашли проваливаемся внутрь
                        if ($requiredExam['min_result'] > $added_subject['result']){
                            $errMsg = "У вас недостаточно баллов по дисциплине '" . $added_subject['name_subject'] . "'";
                        }
                        else {
                            $amount--; //один экзамен из требуемых соответствует, значит уменьшаем количество оставшихся требуемых экзаменов на 1
                        }
                        $flag = true; //поскольку нашли, переключаем флаг и выходим из внутреннего цикла
                        break;                       
                    }
                }
                if ($flag == false){ //если какой-то требуемый экзамен не нашёлся, сообщаем об этом и прекращаем искать остальные
                    $errMsg = "Вы сдали не все необходимые экзамены для этой программы";
                    break;
                }
            }

            if ($amount == 0){ //если требования удовлетворены, то заявка запишется в базу              
                insert('program_enrollee', $params);
                header('location: ' . BASE_URL . 'user/userapplications/index.php');
            }
        }
    }     
}


//удаление заявки пользователем
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_prog'])){
    $params = [
        'name_program' => $_GET['del_prog']
    ];
    $del_prog = selectOne('programs', $params);
    deleteApplicationByUser($_SESSION['id'], $del_prog['id']);
    header('location: ' . BASE_URL . 'user/userapplications/index.php');
}