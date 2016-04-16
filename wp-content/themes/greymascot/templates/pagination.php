<?php
$totalPosts = wp_count_posts()->publish;
$totalPosts /= 5;
$totalPosts = round($totalPosts);
?>
<div class="row">

    <div class="col m12 s12 l12 center-align bg-white">
        <ul class="pagination">
            <?php if (get_previous_posts_link()):  ?>
                <li class="waves-effect"><?= get_previous_posts_link('<i class="fa fa-2x fa-chevron-left"></i>'); ?></li>
            <?php endif; ?>
        <?php
        for ($i=1; $i <= $totalPosts; $i++):
            if ($i > 5) {echo '...'; break;}
            ?>
            <li class="waves-effect"><a href="<?= get_site_url().'/page/'.$i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
            <?php if (get_next_posts_link()):  ?>
                <li class="waves-effect"><?= get_next_posts_link('<i class="fa fa-2x fa-chevron-right"></i>'); ?></li>
            <?php endif; ?>
        </ul>
    </div>

</div>