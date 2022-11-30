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
    

    <title>{% block title %}{% endblock %}</title>
  </head>
  <body> 
    
    <header class = "container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1><a href="/" class="article">Your Admission</a></h1>
                </div> 
                <nav class="col-8">
                    <ul>
                        <li><a href="/" class="article">Главная</a></li>
                        <li><a href="/auth" class="article">Вход</a></li>
                        <li><a href="/reg" class="article">Регистрация</a></li>                        
                    </ul>
                </nav>
            </div>
        </div>
    </header>


    {% block body %}{% endblock %}

    
    <div class="footer container-fluid">
        <div class="footer-content container">
            <div class="row">
                <div class="footer-section about col-md-4 col-12">
                    <p>
                        Найди своё образование
                    </p>
                    <div class="contact">
                        <span>&nbsp; 123-456-789</span>
                        <span>&nbsp; info@youradmission.ru</span>
                    </div>
                </div>                
            </div>

            <div class="footer-bottom">
                &copy; youradmission.ru | Designed by Oleg
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>