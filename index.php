
<?php


//
//$string = '09-02-2016';
//
//$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
//
//$replacement = 'Год $3, месяц $2, день $1';
//
//echo preg_replace($pattern, $replacement, $string);

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');



$router = new Router();
$router->run();


