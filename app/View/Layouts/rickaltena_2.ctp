<?php
/*
 * standard layout file for rickaltena.com
 * @copyright Copyright (c) Rick Altena
 * @version 0.0.1
 */
?>
<!DOCTYPE>
<html>
<head>
<?
echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:400|Work+Sans:300" rel="stylesheet">';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
echo $this->html->css('reset');
echo $this->html->css('rickaltena');
echo $this->fetch('css');
?>
</head>
<body>

<div class="wrapper">
<?
echo $this->fetch('content');
?>
</div>
</body>
</html>
