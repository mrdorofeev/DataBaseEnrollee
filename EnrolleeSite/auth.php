<?php 
    include "path.php";
    include "app/controllers/enrollees.php";
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
    

    <title>Авторизация</title>
  </head>
  <body> 
    
  <?php include("app/include/header.php"); ?>

<div class="container reg_form">
    <form class="row justify-content-md-center" method="post" action="auth.php">
        <h2>Авторизация</h2>
        <div class="mb-3 col-12 col-md-4 err">
          <p><?=$errMsg?></p>
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
          <input value="<?=$emailAuth?>" type="email" name="emailAuth" class="form-control" id="emailAuth" placeholder="Email">
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
          <input type="password" class="form-control" name="passwordAuth" id="passwordAuth" placeholder="Пароль">
        </div>

        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" name="button-auth" class="btn btn-success">Войти</button>
            <a href="reg.php">Зарегистрироваться</a>
        </div>
    </form>
</div>


<?php include("app/include/footer.php"); ?>

</body>
</html>