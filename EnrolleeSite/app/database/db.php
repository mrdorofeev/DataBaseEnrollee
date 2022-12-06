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

    //$sql = $sql . " limit 1";
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
function selectAllFromProgramsWithDepartments($table1, $table2, $limit, $offset){
    global $pdo;
    $sql = "select p.*, d.name_department 
            from $table1 as p join $table2 as d 
            on p.department_id = d.id
            order by name_program
            limit $limit offset $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//поиск по заголовкам (примитивный)
function searchInNameProgram($text, $table1, $table2){
    $text = trim(strip_tags(stripslashes(htmlspecialchars($text))));
    
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