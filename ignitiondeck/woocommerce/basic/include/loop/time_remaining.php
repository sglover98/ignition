<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$days_remaining = apply_filters('date_expired_msg', '0');
if (WPNEOCF()->dateRemaining()){
    $days_remaining = apply_filters('date_remaining_msg', esc_attr(WPNEOCF()->dateRemaining()));
}

$wpneo_campaign_end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);

if ($wpneo_campaign_end_method != 'never_end'){ ?>
	
	<?php if (get_theme_mod( 'progression_studios_shop_index_time_remaining', 'true') == 'true') : ?>
    <div class="helpmeout-index-time-remaining">
		 <span class="helpmeout-index-meta-days-remaining"><?php echo esc_attr($days_remaining); ?></span>
       <?php esc_html_e('remaining days', 'multifondo-progression'); ?>
    </div>
	 <?php endif; ?>
<?php } ?>