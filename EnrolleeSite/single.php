<?php include "path.php"; ?>

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
    

    <title>Страница ОП</title>
  </head>
  <body> 
    
  <?php include("app/include/header.php"); ?>


<div class="container">
    <div class="content row">
        <div class="main-content col-md-9 col-12">
            <h2>Образовательная программа...</h2>

            <div class="single_op row">
                <div class="info">
                    <i>Факультет такой то</i>
                </div>
                <div class="single_op_description col-12">
                    <h3>
                        <a href="#" class="article">Описание программы</a>
                    </h3>

                    <p>
                        Основная образовательная программа специалитета «Астрономия» обеспечивает подготовку специалистов в различных областях современной астрономии и является уникальной как в масштабах России, так и мира
                    </p>
                    <p>
                        Освоение программы обеспечивает одинаково высокую подготовку выпускников в области физики, математики, информатики и информационных технологий
                    </p>
                    <p>
                        Выпускники программы способны работать как в научных, так и в прикладных областях современной астрономии
                    </p>
                </div> 
            </div>
        </div>
        

    </div>
</div>


   
<?php include("app/include/footer.php"); ?>

</body>
</html>