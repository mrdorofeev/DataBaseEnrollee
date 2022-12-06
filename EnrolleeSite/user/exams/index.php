<?php
    include "../../path.php";
    include "../../app/controllers/exams.php";
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
    

    <title>Экзамены</title>
  </head>
  <body> 
    
<?php include("../../app/include/header.php"); ?>
  
<div class="container">
    <div class="row">
        
        <?php include "../../app/include/sidebar-user.php"; ?>

        <div class="applications col-9">
            <div class="col-12">
                <a href="create.php" class="btn btn-primary">Добавить новый</a>
            </div>
            <div class="row title-table">
                <h2>Мои экзамены</h2>
            </div>
        </div>
    </div>
</div>
   




<?php include("../../app/include/footer.php"); ?>

  </body>
</html>