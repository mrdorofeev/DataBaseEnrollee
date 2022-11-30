<?php 
    include "path.php"; 
    include "app/database/db.php";
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
                <h2>Образовательные программы</h2>

               

                <div class="op row">
                    <div class="op_description col-12 col-md-8">
                        <h3>
                            <a href="#" class="article">название ОП</a>
                        </h3>
                        <i>Факультет такой то</i>
                        <p class="preview-text">Немножно текста ознакомительного чтоб заинтересовать</p>
                    </div> 
                </div>


            </div>
            

            <div class="sidebar col-md-3 col-12">
                <div class="section search">
                    <h3>Поиск</h3>
                    <form action="/" method="dep">
                        <input type="text" name="search-term" class="text-input" placeholder="Найти">
                    </form>
                </div> 

                <div class="section departments">
                    <h3><a href="<?php echo BASE_URL . 'departments.php'?>" class="article">Факультеты</a></h3>
                    <ul>
                        
                       

                        <li><a href="#" class="article">tf</a></li>

                        
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <?php include("app/include/footer.php"); ?>

  </body>
</html>