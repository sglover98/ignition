<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<?php if ( $product->is_type( 'crowdfunding' )) : ?>
	
<li <?php wc_product_class( '', $product ); ?>>
	
   <?php do_action('wpneo_campaign_loop_item_before_content'); ?>
	
   <div class="progression-studios-shop-index-content">
       <?php do_action('wpneo_campaign_loop_item_content'); ?>
   </div>
	
   <?php do_action('wpneo_campaign_loop_item_after_content'); ?>
</li>

<?php else: ?>
<li <?php wc_product_class( '', $product ); ?>>
	<div class="progression-studios-shop-index-container">
		
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

		<div class="progression-studios-shop-index-content">
			<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
			<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
			
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			
		</div><!-- close .progression-studios-shop-index-content -->
		
		
	</div><!-- close .progression-studios-shop-index-container -->
</li>

<?php endif; ?>