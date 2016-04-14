<?php

class RelatedPostsWidget extends WP_Widget {
    private $widgetOptions = [
        'classname' => "related-posts-widget",
        'description' => "Fetches the posts from a similar category at a blazing fast speen in less than 10 micro-secons"
    ];

    private $widgetName = 'VS Related Posts';
    private $widgetID = 'related_posts_widget';

    public function __construct () {
        parent::__construct(
            $this->widgetID, $this->widgetName, $this->widgetOptions
        );
    }

    public function form ($instance) {
        $title = (! empty ($instance['relatedPostsTitle']) ? $instance['relatedPostsTitle'] : '');
        $postCount = ! empty ($instance ['relatedPostsCount']) ? $instance ['relatedPostsCount'] : '';
        ?>
        <p>
        <label for="<?= $this->get_field_id('related_posts_title') ?>">Widget Title</label>
        <input type="text" name="<?= $this->get_field_name('relatedPostsTitle') ?>" id="<?= $this->get_field_id('related_posts_title') ?>" value="<?= esc_attr($title) ?>"/>
        <p>
        <label for="<?= $this->get_field_id('related-posts-count') ?>">Widget Title</label>
        <input type="text" name="<?= $this->get_field_name('relatedPostsCount') ?>" id="<?= $this->get_field_id('related-posts-count') ?>" value="<?= esc_attr($postCount) ?>"/>
    <?php
    }

    public function update ($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance ['relatedPostsTitle'] = ! empty($new_instance['relatedPostsTitle']) ? $new_instance['relatedPostsTitle'] : '';
        $instance ['relatedPostsCount'] = ! empty($new_instance['relatedPostsCount']) ? $new_instance['relatedPostsCount'] : '';
        return $instance;
    }

    public function widget ($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance ['relatedPostsTitle'];
        echo $args['after_title'];
        $relatedPosts = $this->relatedPostsByCategory($instance ['relatedPostsCount']);
        ?>
            <ul>
                <?php foreach ($relatedPosts as $post): ?>
                    <li><a href="<?= $post->post_permalink ?>"><?= $post->post_title ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php
        echo $args['after_widget'];
    }

    public function relatedPostsByCategory ($postCount = 5) {
        global $post;
        $catID = $post->post_category[0];

        $args = [
            'category' => $catID,
            'posts_per_page' => $postCount,
            'post_status' => 'publish'
        ];
        $results = get_posts($args);
        foreach ($results as $key=>$p) {
            unset ($results [$key-1]);
        }
        return $results;
    }
}