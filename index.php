<?php
error_reporting( E_ERROR ); 
define('ROOT', dirname(__FILE__));
require_once(ROOT."/core/Autoload.php");
session_start();
$router = new Router();
$router->routing();
?>