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
    

    <title>Создание заявки</title>
  </head>
  <body> 
    
<?php include("../../app/include/header_admin.php"); ?>
  
<div class="container">
    <div class="row">
        
        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="applications col-9">
            <div class="row title-table">
                <h2>Новая заявка</h2>
            </div>
                <div class="row new-application">
                    <form action="create.php" method="post">
                        <label for="deplist" class="form-label">Факультет</label> 
                        <select class="form-select form-select-md mb-3" name="deplist" id="deplist" aria-label=".form-select-lg example">
                            <option selected></option>
                            <option value="1">Факультет прикладной математики — процессов управления</option>
                            <option value="2">Факультет социологии</option>
                            <option value="3">Экономический факультет</option>
                        </select>
                        <label for="oplist" class="form-label">Образовательная программа</label> 
                        <select class="form-select form-select-sm" name="oplist" id="oplist" aria-label=".form-select-sm example">
                            <option selected></option>
                            <option value="1">Большие данные и распределенная цифровая платформа</option>
                            <option value="3">Прикладная математика, фундаментальная информатика и программирование</option>
                            <option value="4">Прикладные компьютерные технологии</option>
                            <option value="5">Программирование и информационные технологии</option>
                        </select>

                        <div class="col">
                            <button name="applic-create" class="btn btn-primary" type="submit">Отправить</button>
                        </div>
                    </form>
                </div>

        </div>
    </div>
</div>
   




<?php include("../../app/include/footer.php"); ?>

  </body>
</html>