<!DOCTYPE html>
<html lang="eu">
    <head>
        <title><?php (!empty($title) ? $title : bloginfo('site_name')); ?></title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
        <!-- Materialize Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" href="<?= bloginfo('stylesheet_url'); ?>"/>

        <?php wp_head(); ?>
    </head>

<body>