<?php
    include "../../path.php";
    include "../../app/controllers/useractions.php"
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
    

    <title>Добавление экзамена</title>
  </head>
  <body> 
    
<?php include("../../app/include/header.php"); ?>
  
<div class="container">
    <div class="row">
       
        <?php include "../../app/include/sidebar-user.php"; ?>

        <div class="applications col-9">
            <h2>Добавление дисциплины</h2>
            <div class="mb-12 col-12 col-md-12 err">
                <p><?=$errMsg?></p>
            </div>

            <form action="create.php" method="post">
                <div class="col-5">
                <label for="exams-list"class="form-label">Выбери предмет</label> 
                    <select name="sub-list" class="form-select form-select-md mb-3" id="sub-list" aria-label=".form-select-lg example">
                        <option selected></option>
                        <?php foreach ($subjects as $key => $subject): ?>
                        <option value="<?=$subject['id']; ?>"><?=$subject['name_subject']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="col-5">
                        <label for="result" class="form-label">Набранные баллы</label>
                        <input name="result" type="text" class="form-control" id="result" placeholder="0-100">
                    </div>
                </div>

                <div class="c-button">
                    <button type="submit" name="add-subject" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>
   




<?php include("../../app/include/footer.php"); ?>

  </body>
</html>