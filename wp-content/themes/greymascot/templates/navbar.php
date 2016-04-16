<nav id="topbar" class="hide-on-med-and-down animated fadeIn">
    <div class="nav-wrapper">
        <a href="<?= bloginfo('url'); ?>" class="brand-logo" style="font-family: tahoma, sans-serif;">slickwik.com</a>
        <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
        <?= wp_nav_menu(['theme_location'=>'top-bar', 'menu_class'=>'right hide-on-med-and-down']); ?>
    </div>
</nav>

<?php include 'navbar-primary.php'; ?>