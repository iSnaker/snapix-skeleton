<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 18.07.2016
 * Time: 10:53
 */
include_once($_SERVER['DOCUMENT_ROOT']."/engine/classes/DB.php");

class App {
    public $db;

    public $name = "";
    public $phone = "";
    public $default_template ="/engine/parts/template.php";

    public static $img_upload_dir = "/image/upload/projects/";
    public static $img_small = 250;
    public static $img_medium = 450;
    public static $img_large = 1200;

    public $links = array(
        array('url' => "/", "name" => "Главная"),
    /*    array('url' => "/catalog", "name" => "Каталог", "sub" => array(
            array("url" => "/", "name" => ""),
        )),*/
        array('url' => "/contacts", "name" => "Контакты")

    );

    public function __construct()
    {
        session_start();
        $this->db = new DB();
    }
}