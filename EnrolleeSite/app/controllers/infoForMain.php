<?php


if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $departments = selectAll('departments');
    $programs = selectAllFromProgramsWithDepartments('programs', 'departments', $limit, $offset);

}


function text(){
    echo "4546ytre456ytrt56y";
    echo "<h3>Поиск</h3>";
}
