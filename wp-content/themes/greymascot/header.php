<!DOCTYPE html>
<html lang="eu">
    <head>
        <title><?php (!empty($title) ? $title : bloginfo('site_name')); ?></title>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php if (has_post_thumbnail()): ?>
            <meta itemprop="image" content="<?= the_post_thumbnail_url('large') ?>">
        <?php endif; ?>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
        <!-- Materialize Link -->
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css"  media="screen,projection"/>-->
        <link rel="stylesheet" href="<?= get_template_directory_uri().'/main.min.css' ?>"/>

        <link rel="stylesheet" href="<?= bloginfo('stylesheet_url'); ?>"/>

        <?php wp_head(); ?>
    </head>

<body>