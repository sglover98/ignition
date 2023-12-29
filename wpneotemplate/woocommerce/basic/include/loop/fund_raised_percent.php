<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>


<?php if (get_theme_mod( 'progression_studios_shop_index_percetnage_text', 'true') == 'true' && get_theme_mod( 'progression_studios_percent_text_location') == 'above' && !empty($mini_deck->item_fund_goal)) : ?>
<div class="helpmeout-index-raised-percent">
    <span class="helpmeout-index-meta-percent" ><?php echo $mini_deck->rating_per; ?></span>
    <?php esc_html_e('funded', 'multifondo-progression'); ?>
</div><!-- close .helpmeout-index-raised-percent -->
<?php endif; ?>

<?php if (get_theme_mod( 'progression_studios_shop_index_percetnage', 'true') == 'true') : ?>
<div class="helpmeout-campaign-index wpneo-raised-bar">
    <div class="neo-progressbar">
        <?php $css_width = $mini_deck->rating_per; if( $css_width >= 100 ){ $css_width = 100; } ?>
        <div style="width: <?php echo esc_attr($css_width); ?>%"></div>
    </div>
</div>
<?php endif; ?>