<?php
define('ROOT', dirname(__FILE__));
require_once(ROOT."/core/Autoload.php");
$router = new Router();
$router->routing();
?>