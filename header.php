<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <?php
            $args = array(
                'theme_location'=> 'header-menu',
                'container' => 'nav',
                'container_class' => ''
            );
            wp_nav_menu($args);
        ?>
    </header>