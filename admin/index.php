<?php

include_once($_SERVER['DOCUMENT_ROOT']."/engine/classes/App.php");
include_once($_SERVER['DOCUMENT_ROOT']."/admin/engine/classes/Simpleimage.php");

$App = new App();

// Form processing
if (isset($_POST['action'])){
    $post_action = $_POST['action'];

    switch ($post_action){
       /* case "add_product":
            $App->db->add(
                array('name','description','category_id'),
                array($_POST['name'],$_POST['description'],$_POST['category']),
                "projects","");

            $App->db->uploadFiles( $App->db->getLastId() );
            header('Location: /admin/');
            break;
        case "edit_product":
            $App->db->set(
                array('name','description','category_id'),
                array($_POST['name'],$_POST['description'],$_POST['category']),
                "projects","WHERE `id` = '".$_POST['project_id']."'");

            $App->db->uploadFiles( $_POST['project_id'] );
            //header('Location: /admin/projects/edit/'.$_POST['project_id']);
            break; */
        default:
            break;
    }
}

// routing based on GET
if (isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action){
        /*case "edit_project":
            $categories = $App->db->get('*','categories');
            $project = $App->db->get('*','projects', "WHERE `id` = '".$_GET['id']."'");
            // get images
            $images = $App->db->get("*", 'project_images', "WHERE `project_id` = '".$project->id."'");
            $project->images = array();
            is_object($images) ? array_push($project->images, $images) :  $project->images = $images;
            $includable = array("/admin/engine/pages/project.edit.php");
            break;*/

        default:
            break;
    }
} else {
    //default action
    /* $projects = $App->db->get("*","projects", " ORDER BY `id` DESC");
    foreach ($projects as &$item){
        $images = $App->db->get("*", 'project_images', "WHERE `project_id` = '".$item->id."'");
        $item->images = array();
        is_object($images) ? array_push($item->images, $images) :  $item->images = $images;
    }*/

    $includable = array("/admin/engine/pages/home.php");
}



include_once($_SERVER["DOCUMENT_ROOT"]."/admin/engine/parts/template.php");
?>