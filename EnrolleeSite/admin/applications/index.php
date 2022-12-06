<?php
    include "../../path.php";
    include "../../app/controllers/applications.php";
?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../../assets/css/admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    

    <title>Заявки</title>
  </head>
  <body> 
    
<?php include("../../app/include/header_admin.php"); ?>
  
<div class="container">
    <div class="row">
        
        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="applications col-9">
            <div class="col-12">
                <a href="create.php" class="btn btn-primary">Новая заявка</a>
            </div>
            <div class="row title-table">
                <h2>Список заявок</h2>
                <div class="col-1">ID</div>
                <div class="col-4">Email абитуриента</div>
                <div class="col-3">Заявка на ОП</div>
                <div class="col-4">Действия</div>
            </div>
            <div class="row application">
                <div class="id col-1">1</div>
                <div class="enrolleeEmail col-4">enrollee@mail.ru</div>
                <div class="applic col-3">ОП</div>
                <div class="edit col-2"><a href="">Изменить</a></div>
                <div class="del col-2"><a href="">Удалить</a></div>
            </div>
        </div>
    </div>
</div>
   




<?php include("../../app/include/footer.php"); ?>

  </body>
</html>