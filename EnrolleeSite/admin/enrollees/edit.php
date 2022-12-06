<?php
    include "../../path.php";
    include "../../app/controllers/enrollees.php"
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
    

    <title>Редактирование пользователя</title>
  </head>
  <body> 
    
<?php include("../../app/include/header_admin.php"); ?>
  
<div class="container">
    <div class="row">
        
        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="applications col-9">         
            <h2>Редактирование пользователя</h2>
            <div class="mb-12 col-12 col-md-12 err">
                <p><?=$errMsg?></p>
            </div>

            <form action="edit.php" method="post">
                <input name="id" value="<?=$id;?>" type="hidden">

                <div class="col">
                    <label for="newfirstName" class="form-label">Имя</label>
                    <input name="newfirstName" value="<?=$firstName;?>" type="text" class="form-control" id="newfirstName" placeholder="Имя">
                </div>
                <div class="col">
                    <label for="emailNotUpdate" class="form-label">Email</label>
                    <input name="email" value="<?=$email;?>" type="email" class="form-control" readonly id="emailNotUpdate">
                </div>

                <div class="col-12">
                    <button type="submit" name="update-user" class="btn btn-primary">Применить изменения</button>
                </div>
            </form>

        </div>
    </div>
</div>
   


<?php include("../../app/include/footer.php"); ?>

  </body>
</html>
