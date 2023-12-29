<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$author_name = wpneo_crowdfunding_get_author_name();
?>
<?php if (get_theme_mod( 'progression_studios_shop_index_byline', 'true') == 'true') : ?>
<div class="helpmeout-index-author"><?php esc_html_e('By','multifondo-progression'); ?> 
	<span><?php echo esc_attr($author_name); ?></span>
</div>
<?php endif; ?>