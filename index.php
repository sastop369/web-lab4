<?php include("connect-to-table.php"); 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <title>EuroNews - новости «Евровидения»</title>
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  </head>
  <body>
    <header>
        <h1>Euro<span>News</span></h1>
        <h2>LIVERPOOL 2023</h2>
    </header>

    <nav class="navbar navbar-dark sticky-top nav-pills nav-fill"> 
      <div class="container-fluid justify-content">
 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span> 
            </button> 
  
            <div class="collapse navbar-collapse" id="navbarNav"> 
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item"> 
                        <a class="nav-link scroll-link" href="index.php">Главная</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link scroll-link" href="all-news.php">Все новости</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link scroll-link" href="contacts.php">Контакты</a> 
                    </li>
                    <?php
                    if(isset($_SESSION["Admin"]))
                    { ?>
                    <li class="nav-item">
                      <a class="nav-link scroll-link" href="redact-news.php">Редактировать новости</a>
                    </li>
                    <?php } ?>
                </ul> 
            </div>
            <?php
            if(!isset($_SESSION['userName'])) { ?>
            <div class="d-flex justify-content-between">
                <a class="nav-link" href="login-form.php">Войти</a>
                <a class="nav-link" href="sign-up-form.php">Зарегистрироваться</a>
              </div>
            <?php }
            else
            {
            ?>
            <div class="d-flex justify-content-between">
            <a class="nav-link disabled">Здравствуй, <?=$_SESSION['userName']?>!</a>
            <a class="nav-link" href="logout.php">Выйти</a>
            </div>
                
            <?php
            }
            ?>
      </div> 
    </nav>


    <?php 
    $from=0;
    $num=6;
    include("load-data.php");
    ?>

    <div class="wrapper">
        <div class="slider single-item">
        <?php 
        for ($i = 0;$i<$num;$i++) {
        ?>
            <div>
                <center><p>
                            <form method="get" action="new-page.php" enctype="multipart/form-data">
                                <input type ='hidden' name='id' value=<?=$news[$i]["ID"]?>></input>
                                <button class="a" type="submit" role="button"><img src="images/headers/<?=$news[$i]["HeadPicture"]?>"><h5 class="title"><?=$news[$i]["Head"]?></h5></button>
                            </form>
                </p></center>
            </div>
        <?php } ?>
        </div>
    </div>



    <div class="last_news">
        <h7>Свежие новости</h7>
    </div>



    <?php 
    $from=0;
    $num=3;
    include("load-data.php");
    ?>

    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php 
        for ($i = 0;$i<$num;$i++) {
        ?>
            <div class="col">
                <div class="card h-100 text-white border-dark bg-danger" style="--bs-bg-opacity: .1;">
                    <img src="images/headers/<?=$news[$i]["HeadPicture"]?>" class="img-top" alt="Monika Linkytė">
                    <div class="card-body">
                        <h5 class="text-decoration-underline"><?=$news[$i]["Head"]?></h5>
                        <p class="card-text" ><?=$news[$i]["ShortText"]?></p>
                        <form method="get" action="new-page.php" enctype="multipart/form-data">
                            <input type ='hidden' name='id' value=<?=$news[$i]["ID"]?>></input>
                            <button class="btn" type="submit" role="button">Читать дальше</button>
                        </form>
                    </div>
                    <p class="card-footer text-white-50"><?=$news[$i]["NewDate"]?></p>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
  <footer class ="sticky-bottom">&copy 2023 Лабораторные работы по дисциплине "Создание современных кроссплатформенных приложений на основе web-технологий"</footer>
  


  <script src="slick/slick.min.js"></script>

  <script src="script.js"></script>
  </body>
</html>