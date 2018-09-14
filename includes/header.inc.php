<?php include( $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php' ); ?>
<?php $page_title = !$page_title ? $pagetitles[$page] : $page_title; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>     <html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]>        <html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]>        <html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $page_title; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="viewport" content="width=device-width">
<link type="text/plain" rel="author" href="<?php echo docroot; ?>humans.txt" />
<?php /* 
<!--[if lte IE 8]>
<link rel="stylesheet" href="<?php echo docroot; ?>css/grids-responsive-old-ie-min.css">
<![endif]-->
<!--[if gt IE 8]><!-->
<link rel="stylesheet" href="<?php echo docroot; ?>css/grids-responsive-min.css">
<!--<![endif]-->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bitter:400,400italic,700|Open+Sans:400,700">
<link rel="stylesheet" type="text/css" href="<?php echo docroot; ?>css/default.css">
<?php
if($detect->isMobile() && !$detect->isTablet()):
?>
<link rel="stylesheet" type="text/css" href="<?php echo docroot; ?>css/mobile.css">
<?php
elseif(!$detect->isMobile()):
?>
<script type="text/javascript" src="<?php echo docroot; ?>js/vendor/modernizr-2.6.2.min.js"></script>
<?php
endif;
?>
<script type="text/javascript" src="<?php echo docroot; ?>js/vendor/jquery-1.9.1.min.js"></script>
<?php if($page == "work" || $page == "home"): ?>
<script type="text/javascript" src="<?php echo docroot; ?>js/vendor/velocity.min.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo docroot; ?>js/plugins.js"></script>
<?php if($page == "work"): ?>
<script type="text/javascript" src="<?php echo docroot; ?>js/main.js"></script>
<?php endif; ?>

*/ ?>
