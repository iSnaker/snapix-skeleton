<?php

define('ROOTPATH', dirname(__DIR__)); // define("ROOT", $_SERVER['DOCUMENT_ROOT']);

include_once(ROOTPATH . "/engine/classes/App.php");

$app = new App();

if (isset($_GET['path']))
{
    switch ($_GET['path'])
    {
        case "404":
            $title = "404";
            $includable = array("/engine/pages/404.php");
            break;
        default:
            header('Location: /404');
            break;
    }
    include_once(ROOTPATH . $app->default_template);
} 
else 
{
    // main page
    $page_class = 'mainpage';
    $title = "";
    $description = "";
    $keywords = "";
    $includable = array(
        "/engine/pages/home.php");

   # $add_css = array('/css/works.css');
   # $add_js = array('/js/jquery.filterizr.min.js', '/js/works.js');

    include_once(ROOTPATH  . $app->default_template);
}




?>
