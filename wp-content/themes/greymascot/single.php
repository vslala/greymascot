<?php 
get_header();
include get_template_directory().'/templates/navbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12 l12"></div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col s12 m8 l8 bg-white">
            <section>
                <div class="post-container">
                    <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <div class="single-post">
                        <div class="single-post__heading"><?= get_the_title(); ?></div>
                        <div class="single-post__blog-info">
                            <div class="row">
                                <div class="col s12">
                                    <span class="single-post__entry"><?= get_avatar( get_the_author_meta( 'ID' ), 62, '', '', ['class'=> 'responsive-img circle'] ); ?></span>
                                    <span class="single-post__entry"><?php the_author() ?></span>
                                    <span class="single-post__entry"><?php the_category() ?></span>
                                    <span class="single-post__entry"><?php the_modified_time() ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="single-post__content"><?= get_the_content(); ?></div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </section>
        </div>
        <div class="col m4 l4"></div>
    </div>
    <hr class="grey"/>
    <div class="row">
        <div class="col m8 l8 s12 bg-white">
            <?php include get_template_directory().'/templates/author-description.php'; ?>
        </div>
    </div>
    <hr class="grey"/>
    <!-- COMMENTS SECTION -->
    <div class="row">
        <div class="col s12 m8 l8 bg-white">
            <section class="comment-form">
                <div class="single-post-comments">
                    <?php comment_form(); ?>
                </div>
            </section>
        </div>
    </div>
</div>


<?php get_footer(); ?>