<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $product;
?>
<div class="helpmeout-listing--index-img">
    <a href="<?php echo get_permalink(); ?>" title="<?php  echo get_the_title(); ?>"> <?php echo woocommerce_get_product_thumbnail(); ?>
	 <div class="helpmeout-overlay"><span><?php esc_html_e('View Project','multifondo-progression'); ?></span></div>
	 </a>
	 <?php if (get_theme_mod( 'progression_studios_shop_index_cat', 'true') == 'true') : ?><?php echo wc_get_product_category_list( $product->get_id(), ' ', '<div class="multifondo-progression-index-fund-cats">', '</div>' ); ?><?php endif; ?>
</div>