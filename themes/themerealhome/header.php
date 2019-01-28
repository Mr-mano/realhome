<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<? bloginfo( 'pingback_url' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
    <header>
        <div class="logo">
            <img src="<?php echo bloginfo('template_url');?>/images/logo-1.png" alt="logo">
        </div>
        <div class="container-menu">
            <?php  wp_nav_menu(array( 'theme_location' => 'menu-principal', 'container' => 'nav')); ?>
        </div>
        <div class="container-reseaux">
            <?php  wp_nav_menu(array( 'theme_location' => 'menu-secondaire', 'container' => 'nav')); ?>
        </div>
    </header>