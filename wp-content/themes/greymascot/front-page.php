<?php get_header(); ?>
<?php include get_template_directory().'/templates/navbar.php'; ?>

<div class="container">
    <div class="row"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col s12 m8 l8 right-border-separation ">
            <section class="">
                <?php
                    if (have_posts()):
                        echo '<div class="post-container">';
                        while (have_posts()) : the_post();
                        ?>
                            <div class="single-post bg-white">
                                <div class="single-post__heading">
                                    <a href="<?php the_permalink(); ?>" class="single-post--title"><?= the_title(); ?></a>
                                </div>
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
                                <?php if(has_post_thumbnail()): ?>
                                    <div class="img-loader">
                                        <img style="width: 100%;height: 100%;" src="https://d13yacurqjgara.cloudfront.net/users/12755/screenshots/1037374/hex-loader2.gif" alt=""/>
                                    </div>
                                <div class="single-post__featured-img">
                                    <a href="<?= the_permalink(); ?>">
                                        <img src="<?= the_post_thumbnail_url('large'); ?>" class="responsive-img" alt=""/>
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="single-post__content">
                                    <?= substr(get_the_excerpt(), 0, 250).'...'; ?>
                                </div>
                                <div class="single-post__btn">
                                    <a href="<?= the_permalink(); ?>" class="waves-effect waves-light red btn-large">Read More</a>
                                </div>
                            </div>
                            <hr class="grey"/>
                <?php endwhile; echo '</div>'; endif; ?>

                <!-- Pagination Template -->
                <?php include get_template_directory().'/templates/pagination.php'; ?>
            </section>
        </div>
        <div class="col m4 l4 hide-on-med-and-down bg-white no-padding">
            <?php dynamic_sidebar('sidebar-1') ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>