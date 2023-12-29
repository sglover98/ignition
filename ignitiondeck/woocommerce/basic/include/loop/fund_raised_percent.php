<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$raised_percent = WPNEOCF()->getFundRaisedPercentFormat();
?>


<?php if (get_theme_mod( 'progression_studios_shop_index_percetnage_text', 'true') == 'true' && get_theme_mod( 'progression_studios_percent_text_location') == 'above' && get_post_meta($post->ID, '_nf_funding_goal', true) != 0) : ?>
<div class="helpmeout-index-raised-percent">
    <span class="helpmeout-index-meta-percent" ><?php echo esc_attr($raised_percent); ?></span>
    <?php esc_html_e('funded', 'multifondo-progression'); ?>
</div><!-- close .helpmeout-index-raised-percent -->
<?php endif; ?>

<?php if (get_theme_mod( 'progression_studios_shop_index_percetnage', 'true') == 'true') : ?>
<div class="helpmeout-campaign-index wpneo-raised-bar">
    <div class="neo-progressbar">
        <?php $css_width = WPNEOCF()->getFundRaisedPercent(); if( $css_width >= 100 ){ $css_width = 100; } ?>
        <div style="width: <?php echo esc_attr($css_width); ?>%"></div>
    </div>
</div>
<?php endif; ?>