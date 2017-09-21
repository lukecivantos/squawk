<!DOCTYPE html>

<html>
    

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <!-- icon -->
        <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
        
        <link rel="icon" href="/img/favicon.ico" type="image/x-icon">

        <meta content="initial-scale=1, width=device-width" name="viewport"/>
        
        <?php if (isset($title)): ?>
            <title>Squawk:<?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Squawk</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body class="body">

        <div class="container">

            <div>
                <div>
                    <a href="/"><img alt="SQUAWK" src="/img/logo.png"/></a>
                </div>
                
                <?php if (!empty($_SESSION["id"])): ?>
                    
            
            <!--<p id="log"><a href="logout.php"><strong>Log Out</strong></a>-->
                <?php endif ?>
                
                
            </div>

            <div id="middle">
