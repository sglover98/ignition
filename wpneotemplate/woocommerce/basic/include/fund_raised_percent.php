<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$raised_percent = WPNEOCF()->getFundRaisedPercentFormat();
global $post;
?>

<?php if (get_theme_mod( 'progression_studios_shop_post_backers_count', 'on' ) == 'on') : ?>
<div class="multifondo-progression-fund-backers">
   <div class="helpmeout-funding-backers"><i class="fa fa-users" aria-hidden="true"></i><?php echo WPNEOCF()->totalBackers(); ?></div>
	<div class="helpmeout-funding-backers-text"><?php esc_html_e( 'backers','multifondo-progression' ); ?></div>
</div>
<?php endif; ?>


<?php if( get_post_meta($post->ID, '_nf_funding_goal', true) != 0 ) : ?>
<?php if (get_theme_mod( 'progression_studios_shop_post_percent_raised', 'on' ) == 'on') : ?>
<div class="wpneo-raised-percent">
    <div class="wpneo-meta-desc"><?php echo esc_attr($raised_percent); ?></div><div class="wpneo-meta-name"><?php esc_html_e('funded', 'multifondo-progression'); ?></div>
</div>
<div class="wpneo-raised-bar">
    <div class="neo-progressbar">
        <?php $css_width = WPNEOCF()->getFundRaisedPercent(); if( $css_width >= 100 ){ $css_width = 100; } ?>
        <div style="width: <?php echo esc_attr($css_width); ?>%"></div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>