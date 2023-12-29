<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;

?>

<?php if (get_theme_mod( 'progression_studios_shop_index_raisd', 'true') == 'true') : ?>
<div class="helpmeoutindex-fund-raised">
		<span class="helpmeoutindex-raised-heading"><?php echo $mini_deck->p_current_sale; ?></span>
		<?php if (get_theme_mod( 'progression_studios_shop_index_goal', 'true') == 'true' && !empty($mini_deck->item_fund_goal)) : ?>
			<?php esc_html_e('raised of', 'multifondo-progression'); ?>
			<?php esc_html_e($mini_deck->item_fund_goal); ?>
			<?php esc_html_e('goal', 'multifondo-progression'); ?>
		<?php else: ?>
			<?php esc_html_e('raised', 'multifondo-progression'); ?>
		<?php endif; ?>
</div><!-- close .helpmeoutindex-fund-raised -->
<?php endif; ?>

<?php if (get_theme_mod( 'progression_studios_shop_index_percetnage_text', 'true') == 'true' && get_theme_mod( 'progression_studios_percent_text_location', 'below') == 'below' && !empty($mini_deck->item_fund_goal)) : ?>
<div class="helpmeout-index-raised-percent">
    <span class="helpmeout-index-meta-percent" ><?php echo $mini_deck->rating_per; ?></span>
    <?php esc_html_e('funded', 'multifondo-progression'); ?>
</div><!-- close .helpmeout-index-raised-percent -->
<?php endif; ?>