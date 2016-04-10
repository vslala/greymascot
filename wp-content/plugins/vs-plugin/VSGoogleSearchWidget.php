<?php
/**
 * Created by PhpStorm.
 * User: Varun
 * Date: 4/10/2016
 * Time: 4:14 PM
 */

class VSGoogleSearchWidget extends WP_Widget {
    private $widgetOptions = [
        'classname' => 'google-search-widget',
        'description' => ''
    ];
    private $widgetName = 'Google Search';
    private $widgetId = 'google_search';
    public function __construct(){
        parent::__construct($this->widgetId, $this->widgetName, $this->widgetOptions);
    }

    public function form($instance){
        $searchPageUrl = ! empty ($instance['searchPageUrl']) ? $instance['searchPageUrl'] : __('Search Page Url', 'text_domain');
        ?>
        <!-- WIDGET FORM -->
        <label for="<?= $this->get_field_id('searchPageUrl') ?>"><?= _e('Google Search Page Url') ?></label>
        <input type="text" id="<?= $this->get_field_id('searchPageUrl'); ?>"
               name="<?= $this->get_field_name('searchPageUrl'); ?>"
            value="<?= esc_attr($searchPageUrl); ?>" />

        <?php
    }

    public function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['searchPageUrl'] = ! empty($new_instance['searchPageUrl']) ? $new_instance['searchPageUrl'] : '';
        return $instance;
    }

    public function widget($args, $instance) {
        ?>
    <!-- WIDGET CONTENT -->
        <form role="form" class="form-inline box" action="<?= $instance['searchPageUrl']; ?>" id="cse-search-box">
            <div class="">
                <input type="hidden" name="cx" value="partner-pub-3963876904167425:8690882599" />
                <input type="hidden" name="cof" value="FORID:10" />
                <input type="hidden" name="ie" value="UTF-8" />
                <input type="text" style="width: 100%;" class="form-control" name="q" placeholder="Search anything..." />
            </div>
            <div class="form-group hidden">
                <button type="submit" class="btn btn-green" name="sa">search</button>
            </div>
        </form>

        <?php
    }
}