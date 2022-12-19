<?php

session_start();
require 'connect.php';


function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}


// проверка на выполнение запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}


// запрос на получение данных c одной таблицы
function selectAll($table, $params = []){
    global $pdo;

    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " where $key = $value";
            }
            else{
                $sql = $sql . " and $key=$value";
            }
            $i++;
        }        
    }
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);

    return $query->fetchall();
}


// запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;

    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " where $key = $value";
            }
            else{
                $sql = $sql . " and $key=$value";
            }
            $i++;
        }      
    }

    $query = $pdo->prepare($sql);
    $query->execute();   
    dbCheckError($query);

    return $query->fetch();
}


// запись в таблицу БД
function insert($table, $params){
    global $pdo;
    //insert into enrollees (firstName, email, password) values ('Oleg', 'first@mail.ru', '123');
    $i = 0;
    $col = '';
    $mask = '';
    foreach($params as $key => $value) {
        if ($i === 0){
            $col = $col . "$key";
            $mask = $mask . "'$value'";
        }
        else {
            $col = $col . ", $key";
            $mask = $mask .  ", '$value'";
        }
        $i++;
    }
       
    
    $sql = "insert into $table ($col) 
            values ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}


//обновление строки в таблице
function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }
        else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
       
    // update enrollees set email = 'newmail@mail.ru', password = '777' where id = 3
    $sql = "update $table set $str
            where id = $id           
            ";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}


//удаление строки из таблицы
function delete($table, $id){
    global $pdo;
       
    // delete from enrollees where id = 3
    $sql = "delete from $table
            where id =" . $id;

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}


//вывод ОП-м на главную
function selectAllFromProgramsWithDepartments($limit, $offset){
    global $pdo;

    $sql = "select programs.*, departments.name_department
            from programs 
            join departments on programs.department_id = departments.id 
            order by name_program
            limit $limit offset $offset";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//для отдельной ОП достаём список экзаменов и минимальный проходной балл
function getSubjectsForProgram($program_id){
    global $pdo;

    $sql = "select subjects.*, program_subject.min_result
            from subjects
            join program_subject on program_subject.subject_id = subjects.id
            and program_subject.program_id = $program_id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//поиск по заголовкам (примитивный)
function searchInNameProgram($text, $table1, $table2){
    $text = trim(strip_tags(stripslashes(htmlspecialchars($text)))); //очистка входного текста
    
    global $pdo;

    $sql = "select p.*, d.name_department 
            from $table1 as p join $table2 as d 
            on p.department_id = d.id
            where p.name_program like '%$text%'
            order by name_program";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//количество строк в таблице
function countRow($table){
    global $pdo;

    $sql = "select count(*) from $table";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}


//удаление строки из таблицы c двойным ключом
function deleteFromTableWithCompositeKey($table, $nameFirstCol, $nameSecondCol, $idFirstCol, $idSecondCol){
    global $pdo;
       
    $sql = "delete from $table
            where $nameFirstCol = $idFirstCol and $nameSecondCol =" . $idSecondCol;

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}


//выводим экзамены пользователя
function getUserExams($enrollee_id){
    global $pdo;

    $sql = "select enrollee_subject.*, subjects.name_subject 
            from enrollee_subject join subjects
            on enrollee_subject.subject_id = subjects.id
            and enrollee_subject.enrollee_id = $enrollee_id
            order by name_subject";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//удаление экзамена пользователем
function deleteExamByUser($enrollee_id, $subject_id){
    global $pdo;
       
    $sql = "delete from enrollee_subject
            where enrollee_id = $enrollee_id and subject_id = $subject_id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}


//выводим заявки пользователя
function getUserApplications($enrollee_id){
    global $pdo;

    $sql = "select program_enrollee.program_id, programs.name_program 
            from program_enrollee join programs
            on program_enrollee.program_id = programs.id
            and program_enrollee.enrollee_id = $enrollee_id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//удаление экзамена пользователем
function deleteApplicationByUser($enrollee_id, $program_id){
    global $pdo;
       
    $sql = "delete from program_enrollee
            where enrollee_id = $enrollee_id and program_id = $program_id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}


//вывод заявок в админку
function selectAllApplications(){
    global $pdo;

    $sql = "select program_enrollee.*, programs.name_program, enrollees.email, enrollees.firstName
            from program_enrollee 
            join programs on programs.id = program_enrollee.program_id
            join enrollees on enrollees.id = program_enrollee.enrollee_id
            order by name_program";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//удаление пользователя (админом)
function deleteUser($enrollee_id){
    global $pdo;
       
    $sql = "delete from program_enrollee
            where enrollee_id = $enrollee_id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    $sql = "delete from enrollees
            where id =" . $enrollee_id;

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}