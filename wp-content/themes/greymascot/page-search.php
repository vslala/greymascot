<?php
get_header();
include get_template_directory().'/templates/navbar.php';
?>
<div class="container">
    <div class="row">
        <div class="col m8 l8 s12">
            <!-- INSERT GOOGLE SEARCH JAVASCRIPT HERE -->
            <div id="cse-search-results">
                <div class="img-loader" id="page_search_loader">
                    <img style="width: 100%;height: 100%;" src="https://d13yacurqjgara.cloudfront.net/users/12755/screenshots/1037374/hex-loader2.gif" alt=""/>
                </div>
            </div>
            <script type="text/javascript">
                var googleSearchIframeName = "cse-search-results";
                var googleSearchFormName = "cse-search-box";
                var googleSearchFrameWidth = '600';
                var googleSearchDomain = "www.google.com";
                var googleSearchPath = "/cse";
            </script>
            <script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
        </div>
        <div class="col m4 l4 hide-on-med-and-down">
            <?php dynamic_sidebar('primary-sidebar') ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>