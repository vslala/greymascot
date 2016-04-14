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
    <div class="row">
        <div class="col-md-3">
            <div class="card medium">
                <div class="card-image">
                    <img src="<?= $url; ?>" style="height: 200px;">
                    <span class="card-title"><?= $rp['heading']; ?></span>
                </div>
                <div class="card-content">
                    <p class="card-title--summary"><?= substr($rp['summary'], 0, 140).'...'; ?></p>
                </div>
                <div class="card-action">
                    <a href="<?= $blogUrl; ?>">Read...</a>
                </div>
            </div>

        </div>
    </div>

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