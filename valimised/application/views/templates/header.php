<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>E-valimised 2015</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="/valimised/css/bootstrap.css">

        <?php
        if (isset($styles) && is_array($styles)) {
            foreach ($styles as $style) {
                echo "<link rel=\"stylesheet\" href=\"" . $style . "\">\n";
            }
        }
        ?>

        <script src="/valimised/js/libs/jquery-1.11.2.min.js"></script>
        <script src="/valimised/js/libs/bootstrap.min.js"></script>
        <script src="/valimised/js/libs/angular.min.js"></script>
        <script src="/valimised/js/libs/ng-table.min.js"></script>
        <script src="/valimised/js/LoginModalCtrl.js" ></script>
        <script src="/valimised/js/libs/ui-bootstrap-tpls-0.12.1.min.js"></script>

        <?php
        if (isset($scripts) && is_array($scripts)) {
            foreach ($scripts as $script) {
                echo "<script src=\"" . $script . "\"></script>\n";
            }
        }
        ?>
    </head>
    <body ng-app="main">
