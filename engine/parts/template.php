<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="" />
    <meta name="google-site-verification" content="" />
    <meta name='wmail-verification' content='' />

    <title><?php if(isset($title)){print $title;} else {print $app->name;} ?></title>
    <?php if (isset($description)) { ?>
        <meta name="description" content="<?php echo $description; ?>"/>
    <?php } ?>
    <?php if (isset($keywords)) { ?>
        <meta name="keywords" content="<?php echo $keywords;?>"/>
    <?php } ?>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/slick.css" rel="stylesheet">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" media="screen">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/custombox.min.css">

    <!-- add custom css -->
    <?php if (isset($add_css)){
        foreach ($add_css as $item){ ?>
            <link rel="stylesheet" href="<?php print $item; ?>">
        <?php }
    } ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!--Google analytics-->
</head>
<body>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/engine/parts/header.php");?>

<div class="page<?php if (isset($page_class)) { print '-'.$page_class; } ?>">
    <?php
    if(isset($includable)){
        foreach ($includable as $item){
            include_once($_SERVER['DOCUMENT_ROOT'].$item);
        }
    }
    ?>
    <?php  include_once($_SERVER['DOCUMENT_ROOT']."/engine/parts/footer.php");?>
</div>

<!-- callback Modal -->
</body>
<script type="text/javascript" src="/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/slick.min.js"></script>
<script type="text/javascript" src="/js/fancybox/jquery.mousewheel.pack.js"></script>
<script type="text/javascript" src="/js/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="/js/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/js/modernizr.js"></script>
<script type="text/javascript" src="/js/velocity.min.js"></script>
<script type="text/javascript" src="/js/velocity.ui.min.js"></script>
<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="/js/custombox.min.js"></script>
<!-- add custom js -->
<?php if (isset($add_js)){
    foreach ($add_js as $item){ ?>
        <script type="text/javascript" src="<?php print $item; ?>"></script>
    <?php }
} ?>
<script src="/js/script.js"></script>
</html>