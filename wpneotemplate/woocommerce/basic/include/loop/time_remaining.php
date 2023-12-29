<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ($mini_deck->end_type !== 'open'){ ?>
	
	<?php if (get_theme_mod( 'progression_studios_shop_index_time_remaining', 'true') == 'true') : ?>
    <div class="helpmeout-index-time-remaining">
		 <span class="helpmeout-index-meta-days-remaining"><?php echo $mini_deck->days_left; ?></span>
       <?php esc_html_e('remaining days', 'multifondo-progression'); ?>
    </div>
	 <?php endif; ?>
<?php } ?>