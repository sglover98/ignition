<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
//the_content();


?>
<div class="tab-description tab_col_9 tab-campaign-story-left">
    <h2><?php _e('Campaign Story', 'multifondo-progression') ?></h2>
    <?php the_content(); ?>
</div>
<div class="tab-rewards tab_col_3 tab-campaign-story-right">
    <?php do_action('wpneo_campaign_story_right_sidebar'); ?>
	<div style="clear: both"></div>
</div>

<?php


?>