<?php 
define('ROOT',dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

$main = new Main();
$main->run();
?>