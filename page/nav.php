<?php ?>
<html>
    <?php include '../page/config.php';?>
<head>
    <link rel="shortcut icon" href="../img/bmw1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time();?>">
    <title>Careers in BMW</title>
</head>
<body>
    <nav>
        <div id="scroll-Top"></div>
        <div class="logo">
           <a href="..//page/Home.php"> <img src="../img/bmw1.png" class="bmw-logo"></a>
        </div>
        <ul>
            <li><a class="active" href="../page/Home.php">Home</a></li>
            <li><a href="../page/Careers.php">Careers</a></li>
        </ul>
        
<nav>
    <!-- Other navigation items -->
    <div class="g1">
        <?php   if (isset($_SESSION['username'])): ?>
            <span>Welcome<img src="..//img/welcome.png" width="20px"> <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="../page/logout.php" class="box">Logout</a>
        <?php else: ?>
            <a href="../page/login.php" class="box"><img src="../img/bxs-user.svg">Login</a>
        <?php endif; ?>
    </div>
 
    <!-- Rest of the navigation content -->
</nav>

        <br>
        <div class="g2">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="search-container">
            <input name="search" type="text" placeholder="Search Careers">
            <button type="submit"><img src="../img/search.png"></button>
        </form></div>
        <a href="#scroll-Top">
            <div class="scroll-text">Top</div>
            <div class="scroll-arrow"></div>
        </a>
    </nav>
</body>
</html>
