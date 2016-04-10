
<section class="author-box">
    <div class="row">
        <div class="col m2 s2 l2">
            <?= get_avatar( get_the_author_meta('ID'), '100', '', null, ['class'=>'responsive-img circle'] ); ?>
        </div>
        <div class="col m10 s10 l10">
            <div class="author-box__title">Article by <span class="uppercase red-text"><?= get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?></span></div>
            <div class="author-box__description"><span class="paragraph"><?= get_the_author_meta('description'); ?></span></div>
        </div>
    </div>
</section>