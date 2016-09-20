<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php if(isset($title)){print $title;}else{print "";} ?>
    </title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <?php if (isset($addictional_css)) {
        foreach ($addictional_css as $item){ ?>
            <link href="<?php print $item; ?>" type="text/css" rel="stylesheet">
        <?php }
    } ?>
</head>
<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/engine/parts/header.php");?>

<section id="page-content" class="page<?php if (isset($page_class)) { print '-'.$page_class; } ?>">
    <?php if (isset($content)){ ?>
        <?php print $content; ?>
    <?php } ?>
    <?php
    if(isset($includable)){
        foreach ($includable as $item){
            include_once($_SERVER['DOCUMENT_ROOT'].$item);
        }
    }
    ?>
</section>


<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/engine/parts/footer.php");?>

<script src="/js/jquery-2.1.1.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/modernizr.js"></script>
<script src="/js/main.js"></script>
<script src="/js/script.js"></script>

<?php if (isset($addictional_js)) {
    foreach ($addictional_js as $item){ ?>
        <script type="text/javascript" src="<?php print $item; ?>"></script>
    <?php }
} ?>

<?php //include_once($_SERVER['DOCUMENT_ROOT']."/engine/parts/modals.php");?>
</body>
</html>