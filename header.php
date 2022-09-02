<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/header.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4c624a4124.js" crossorigin="anonymous"></script>
   
</head>
<body>
<header>
        <div class="borderH">
            <nav class="menu">
              <a href="../mainpage.php"><img class="logo-menu" src="img/logo.png" /></a>
              <ul> 
                  <li>
                    <div class="popUpMenu">
                        <a class="focus search" href="#"><i class="fa fa-search"></i></a>
                        <div class="hidden hSearch">
                            <input ENGINE="text" name="referal" class="inpSearch" type="text" autocomplete="off" placeholder="Поиск..." />
                            <div class="listUsers">
                            <ul class="search_result"></ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="plus"><a href="add-photo.php"><i class="fa fa-plus"></a></i></li>
               
                <li><a href="mainpage.php"><i class="fa fa-layer-group"></i></a></li>
                <li>
                <a class="focus search" href="profile.php"><i class="fa fa-user"></i></a>
                </li>
                                
                <li><a href="php/logout.php" class="exit_button"><span>Выход</span></a></li>
                   
               
              </ul>
            </nav>
        </div>
    </header>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/header.js"></script>
    <script src="js/search.js"></script>
</body>
</html>