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
    

    <title>Регистрация</title>
  </head>
  <body> 
    
  <?php include("app/include/header.php"); ?>


<div class="container reg_form">
    <form class="row justify-content-md-center" method="post" action="reg.php">
        <h2>Форма регистрации</h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p><?=$errMsg?></p>
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
            <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Фамилия">
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
            <input type="text" class="form-control" name="firstName" id="firstName" value="<?=$firstName?>" placeholder="Имя">
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
            <input type="text" class="form-control" name ="lastName" id="lastName" placeholder="Отчество">
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
            <input type="email" class="form-control" name="email" id="email" value="<?=$email?>" aria-describedby="emailHelp" placeholder="Email">
            <div id="emailHelp" class="form-text">Мы не передаём Ваши данные третьим лицам.</div>
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
            <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
            <input type="password" class="form-control" name="passwordCheck" id="passwordCheck" placeholder="Повтор пароля">
        </div>
        <div class="row"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" class="btn btn-success" name="button-reg">Регистрация</button>
            <a href="auth.php">Войти</a>
        </div>
    </form>
</div>


   
<?php include("app/include/footer.php"); ?>

</body>
</html>