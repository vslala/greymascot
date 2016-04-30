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
        <label for="<?= $this->get_field_id('related_posts_title') ?>">Widget Title</label><br/>
        <input type="text" name="<?= $this->get_field_name('relatedPostsTitle') ?>" id="<?= $this->get_field_id('related_posts_title') ?>" value="<?= esc_attr($title) ?>"/>
        <p>
        <label for="<?= $this->get_field_id('related-posts-count') ?>">Post Counts to List</label><br/>
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
        $siteUrl = get_bloginfo('url').'/';
        ?>
        <!-- This is how the posts will be shown in the frontend -->
            <ul>
                <?php foreach ($relatedPosts as $post): ?>
                    <li><a href="<?= $siteUrl.$post->post_name ?>"><?= $post->post_title ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php
        echo $args['after_widget'];
    }

    public function relatedPostsByCategory ($postCount = 5) {
        global $post, $wpdb;
        $catID = $post->post_category[0];
        $postID = $post->ID;

        # fetches ID, post_title, post_name (slug) by category ID
        $sql = "SELECT $wpdb->posts.ID, $wpdb->posts.post_title, $wpdb->posts.post_name from $wpdb->posts LEFT JOIN $wpdb->term_relationships ON $wpdb->term_relationships.object_id = $wpdb->posts.ID WHERE $wpdb->term_relationships.term_taxonomy_id = %d AND $wpdb->posts.post_status = %s ORDER BY $wpdb->posts.post_modified";

        $results = $wpdb->get_results ( $wpdb->prepare ($sql, $catID, 'publish') );

        foreach ($results as $key=>$p) {
            if ($p->ID == $postID) {
                unset ($results [$key]);
            }
        }
        return $results;
    }
}