<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$funding_goal = get_post_meta($post->ID, '_nf_funding_goal', true);

$raised_percent = WPNEOCF()->getFundRaisedPercentFormat();
$raised = 0;
$total_raised = WPNEOCF()->totalFundRaisedByCampaign();
if ($total_raised){
    $raised = $total_raised;
}

?>

<?php if (get_theme_mod( 'progression_studios_shop_index_raisd', 'true') == 'true') : ?>
<div class="helpmeoutindex-fund-raised">
		<span class="helpmeoutindex-raised-heading"><?php echo wc_price($raised); ?></span>
		<?php if (get_theme_mod( 'progression_studios_shop_index_goal', 'true') == 'true' && get_post_meta($post->ID, '_nf_funding_goal', true) != 0) : ?>
			<?php esc_html_e('raised of', 'multifondo-progression'); ?>
			<?php echo wc_price( $funding_goal ); ?>
			<?php esc_html_e('goal', 'multifondo-progression'); ?>
		<?php else: ?>
			<?php esc_html_e('raised', 'multifondo-progression'); ?>
		<?php endif; ?>
</div><!-- close .helpmeoutindex-fund-raised -->
<?php endif; ?>

<?php if (get_theme_mod( 'progression_studios_shop_index_percetnage_text', 'true') == 'true' && get_theme_mod( 'progression_studios_percent_text_location', 'below') == 'below' && get_post_meta($post->ID, '_nf_funding_goal', true) != 0) : ?>
<div class="helpmeout-index-raised-percent">
    <span class="helpmeout-index-meta-percent" ><?php echo esc_attr($raised_percent); ?></span>
    <?php esc_html_e('funded', 'multifondo-progression'); ?>
</div><!-- close .helpmeout-index-raised-percent -->
<?php endif; ?>