<header class = "container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1><a href="<?php echo BASE_URL ?>" class="article">Your Admission</a></h1>
            </div> 
            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>" class="article">Главная</a></li>
                    
                    <?php if(isset($_SESSION['id'])): ?>
                        <li><a href="#" class="article">
                            <?php echo $_SESSION['firstName']; ?>
                        </a>
                        <ul>
                            <?php if ($_SESSION['admin']): ?>
                                <li><a href="<?php echo BASE_URL . 'admin/applications/index.php'?>" class="article">Админка</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo BASE_URL . 'user/userapplications/index.php'?>" class="article">Кабинет</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo BASE_URL . 'logout.php'?>" class="article">Выход</a></li>
                        </ul>
                        </li>
                        
                    <?php else: ?>
                        <li><a href="<?php echo BASE_URL . 'auth.php'?>" class="article">Вход</a></li>
                        <li><a href="<?php echo BASE_URL . 'reg.php'?>" class="article">Регистрация</a></li>     

                    <?php endif; ?>
                                        
                </ul>
            </nav>
        </div>
    </div>
</header>