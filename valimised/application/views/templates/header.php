<html>
    <head>
        <title>E-valimised 2015</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/bootstrap.css">
        
        <?php
        if (isset($styles) && is_array($styles)) {
            foreach ($styles as $style) {
                echo "<link rel=\"stylesheet\" href=\"" . $style . "\">\n";
            }
        }
        ?>
        
        <script src="js/libs/jquery.js"></script>
        <script src="js/libs/bootstrap.js"></script>
        <script src="js/libs/angular.js"></script>
        <script src="js/libs/ng-table.js"></script>
        
        <?php
        if (isset($scripts) && is_array($scripts)) {
            foreach ($scripts as $script) {
                echo "<script src=\"" . $script . "\"></script>\n";
            }
        }
        ?>
        
    </head>
    <body>
