<div class="container">
    <div class="row"></div>
    <div class="row">
        <div class="col s12 m12 l12">
            <nav id="primary_nav" class="animated fadeIn">
                <div class="nav-wrapper">
                    <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons header-icon">menu</i></a>
                    <?= wp_nav_menu(['theme_location'=>'primary', 'menu_class'=>'left hide-on-med-and-down']); ?>
                    <?= wp_nav_menu(['theme_location'=>'primary', 'menu_class'=>'side-nav', 'menu_id'=>'mobile-nav']); ?>
                </div>
            </nav>
        </div>
    </div>
</div>