<?php
get_header();
include get_template_directory().'/templates/navbar.php';
?>

<div class="container">
    <div class="row">

        <?php if (have_posts()): ?>

            <?php while (have_posts()) : the_post(); ?>

                <div class="col s6 m4 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?php the_post_thumbnail_url([200,100]); ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?php the_title() ?><i class="material-icons right">more_vert</i></span>
                            <p><a href="<?php the_permalink() ?>">Read More...</a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?php the_title() ?><i class="material-icons right">close</i></span>
                            <p>
                                <?php the_excerpt() ?><a href="<?= the_permalink() ?>">Read More...</a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>