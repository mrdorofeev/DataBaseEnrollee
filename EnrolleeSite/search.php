<?php 
    include "path.php"; 
    include SITE_ROOT . "/app/database/db.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
        $programs = searchInNameProgram($_POST['search-term'], 'programs', 'departments');
    }
?>


<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    

    <title>Главная</title>
  </head>
  <body> 
    
<?php include("app/include/header.php"); ?>
  

    <div class="container">
        <div class="content row">
            <div class="main-content col-md-9 col-12">
                <h2>Вот что нашлось...</h2>
                <?php if(!empty($programs)): ?>
                    <div class="op row">
                        <?php foreach ($programs as $key => $program): ?>
                            <div class="op_description col-12 col-md-8">
                                <h3>
                                    <a href="#" class="article"><?=$program['name_program'];?></a>
                                </h3>
                                <i><?=$program['name_department'] ?></i>
                                <p class="preview-text">Бюджетных мест: <?=$program['student_amount'];?></p>
                            </div> 
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <h3>Ничего :(</h3>
                <?php endif; ?>
            </div>
            
 
        </div>
    </div>




    <?php include("app/include/footer.php"); ?>

  </body>
</html>