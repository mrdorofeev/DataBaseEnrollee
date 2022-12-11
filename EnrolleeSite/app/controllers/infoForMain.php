<?php

$page = isset($_GET['page']) ? $_GET['page']: 1;
$limit = 6;
$offset = $limit * ($page - 1);
$total_pages = round(countRow('programs') / $limit, 0);


if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $departments = selectAll('departments');
    $programs = selectAllFromProgramsWithDepartments($limit, $offset);

}


//поиск
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
    $searchedprograms = searchInNameProgram($_POST['search-term'], 'programs', 'departments');
}
