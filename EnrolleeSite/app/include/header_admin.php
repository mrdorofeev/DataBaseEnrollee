
<header class = "container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1><a href="<?php echo BASE_URL ?>" class="article">Your Admission</a></h1>
            </div> 
            <nav class="col-8">
                <ul>                        
                    <li>
                        <a href="#" class="article">
                        <?php echo $_SESSION['firstName'] ?>
                        </a>
                    <ul>
                        <li><a href="<?php echo BASE_URL . 'logout.php'?>" class="article">Выход</a></li>
                    </ul>
                    </li>                                       
                </ul>
            </nav>
        </div>
    </div>
</header>