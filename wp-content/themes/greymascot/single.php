<?php 
get_header();
include get_template_directory().'/templates/navbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col s12 m12 l12"></div>
    </div>
</div>

<div class="container" itemscope itemtype="http://schema.org/Article">
    <div class="row">
        <div class="col s12 m8 l8 bg-white">
            <section>
                <div class="post-container">
                    <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <div class="single-post">
                        <div class="single-post__heading" itemprop="name"><?= get_the_title(); ?></div>
                        <div class="single-post__blog-info">
                            <div class="row">
                                <div class="col s12">
                                    <span class="single-post__entry"><?= get_avatar( get_the_author_meta( 'ID' ), 62, '', '', ['class'=> 'responsive-img circle'] ); ?></span>
                                    <span class="single-post__entry" itemprop="author"><?php the_author() ?></span>
                                    <span class="single-post__entry"><?php the_category() ?></span>
                                    <span class="single-post__entry"><?php the_date() ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="single-post__content" itemprop="articleBody"><?php the_content() ?></div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </section>
        </div>
        <div class="col m4 l4">
            <?php dynamic_sidebar('single_sidebar'); ?>
        </div>
    </div>
    <hr class="grey"/>
    <div class="row">
        <div class="col m8 l8 s12 bg-white">
            <?php include get_template_directory().'/templates/author-description.php'; ?>
        </div>
    </div>
    <hr class="grey"/>

    <!-- Related Posts Section -->
    <?php
    $relatedPosts = getRelatedPostsByCategory(4);
    if (!empty($relatedPosts)) :
    ?>
    <div class="row">
        <div class="col s12 m12 l12 section-title">Related Posts</div>
        <br/>
        <?php foreach ($relatedPosts as $post): ?>
        <div class="col s12 m3 l3 bg-white">
            <div class="card medium">
                <div class="card-image" style="height: 200px;">
                    <?= get_the_post_thumbnail($post->ID, 'small') ?>
                    <span class="card-title"><?= $post->post_title; ?></span>
                </div>
                <div class="card-content">
                    <p class="card-title--summary"><?= substr($post->post_content, 0, 140).'...'; ?></p>
                </div>
                <div class="card-action">
                    <a href="<?= $post->post_permalink; ?>" >Read...</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- COMMENTS SECTION -->
    <div class="row bg-white">
        <div class="col s12 m8 l8">
            <section class="comment-form">
                <div class="single-post-comments">
                    <?php comment_form(); ?>
                </div>
            </section>
        </div>
    </div>
</div>


<?php get_footer(); ?>