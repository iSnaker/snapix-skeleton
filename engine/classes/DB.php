<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02.05.2016
 * Time: 18:50
 */
include_once($_SERVER['DOCUMENT_ROOT']."/engine/classes/Options.php");
include_once($_SERVER['DOCUMENT_ROOT']."/admin/engine/classes/Simpleimage.php");

class DB {
    public $connector;

    public function __construct(){
        $options = new Options();
        try {
            $this->connector = new PDO("mysql:host=$options->db_host;dbname=$options->db_name", $options->db_user, $options->db_password);
            $this->connector->query('SET NAMES `UTF8`');
            // echo("ok");
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function get($what = "*", $table = "", $params = ""){

        $query = "SELECT $what FROM `$table` $params";
        //print $query;
        $res = $this->connector->query($query);

        try {
            if (is_a($res, 'object') || is_a($res, 'PDOStatement')) {
                $res->setFetchMode(PDO::FETCH_OBJ);
                $res = $res->fetchAll();
                if (count($res) == 1){$res = $res[0];}
            } else {
                $res = "Ошибка подключения к таблице $table";
            }
        } catch (Exception $e) {
            $res = "err".$e->getMessage();
        }
        return $res;
    }

    public function add($what = array(), $values = array(), $table = "", $params = "", $showquery = 0){
        $str_columns = "";
        $str_values = "";

        if (count($what) != count($values)) {
            throw new Exception("Data not similar!");
        }

        for ($i = 0; $i < count($what); $i++){
            $str_columns.= " `$what[$i]`";
            $str_values.= "'".$values[$i]."'";
            ($i < count($what)-1) ? $str_columns.= "," : "";
            ($i < count($what)-1) ? $str_values.= "," : "";
        }

        if ($showquery == 1){
            $response['query'] = "INSERT INTO `$table` ($str_columns) VALUES ($str_values) $params";
            $response['params'] = json_encode($values);
        }

        try {
            $query = $this->connector->prepare("INSERT INTO `$table` ($str_columns) VALUES ($str_values) $params");
            $result = $query->execute($values);

            if (($result == true)) {
                $response['response_text'] = "OK";
            } else {
                $response['response_text'] = "Ошибка подключения к таблице $table";
            }
        } catch (Exception $e) {
            $response['response_text'] = "err".$e->getMessage();
        }

        return $response;
    }

    public function set($what = array(),$values = array(), $table = "", $params = ""){
        $str = "";

        if (count($what) != count($values)) {
            throw new Exception("Data not similar!");
        }

        for ($i = 0; $i < count($what); $i++){
            $str.= " `$what[$i]`='$values[$i]'";
            ($i < count($what)-1) ? $str.= "," : "";
        }

        $query = "UPDATE `$table` SET $str $params";

        $res = $this->connector->query($query);

        try {
            if (is_a($res, 'object') || is_a($res, 'PDOStatement')) {
                $res->setFetchMode(PDO::FETCH_OBJ);
                $res = $res->fetchAll();
            } else {
                $res = "Ошибка подключения к таблице $table";
            }
        } catch (Exception $e) {
            $res = "err".$e->getMessage();
        }
        return $res;
    }

    public function remove($table, $params){
        $query = "DELETE FROM `$table` $params";
        $result = $this->connector->exec($query);
        return $result;
    }

    public function removeById($table, $id){
        $query = "DELETE FROM `$table` WHERE `id` ='$id'";
        $result = $this->connector->query($query);
        return $result;
    }

    public function getLastId(){
        return $this->connector->lastInsertId();
    }

    function uploadFiles($projectId){
        $response = [];
        for($i=0; $i<count($_FILES['images']['name']); $i++){

            $target_path = $_SERVER['DOCUMENT_ROOT'].App::$img_upload_dir;
            $ext = explode('.', basename( $_FILES['images']['name'][$i]));

            $filename = md5(uniqid()) . "." . $ext[count($ext)-1];

            if (!is_dir($target_path.$projectId)){ mkdir($target_path.$projectId);  }
            if (!is_dir($target_path.$projectId."/original")){ mkdir($target_path.$projectId."/original/"); }

            $target_path = $target_path.$projectId;
            $target_path_to_original = $target_path."/original/".$filename;

            if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $target_path_to_original)) {
                $simpleimage = new SimpleImage($target_path_to_original);

                // resize to big
                if (!is_dir($target_path."/".App::$img_large)){ mkdir($target_path."/".App::$img_large."/");}
                $simpleimage->resizeToWidth(App::$img_large);
                $simpleimage->save($target_path."/".App::$img_large."/".$filename);
                // resize to medium
                if (!is_dir($target_path."/".App::$img_medium)){ mkdir($target_path."/".App::$img_medium."/");}
                $simpleimage->resizeToWidth(App::$img_medium);
                $simpleimage->save($target_path."/".App::$img_medium."/".$filename);
                // resize to small
                if (!is_dir($target_path."/".App::$img_small)){ mkdir($target_path."/".App::$img_small."/");}
                $simpleimage->resizeToWidth(App::$img_small);
                $simpleimage->save($target_path."/".App::$img_small."/".$filename);

                // append to database
               $this->add(
                    array('img','project_id'),
                    array($filename,$projectId),
                   "project_images");

                $response['result'] = "OK";
            } else{
                $response['result'] = "Error";
            }
        }
        print json_encode($response);
    }
}