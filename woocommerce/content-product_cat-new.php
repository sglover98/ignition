<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li <?php wc_product_cat_class( '', $category ); ?>>
	<div class="progression-studios-shop-category-container">
		
		<a href="<?php echo esc_url( get_term_link( $category, 'product_cat' ) )?>" <?php
		$cat_id  			= get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
		$cat_image_url = wp_get_attachment_image_src($cat_id, 'progression-studios-category-image');
		if ( $cat_image_url ) {
			echo "style='background-image:url(";
			echo esc_url($cat_image_url[0]);
			echo ")';";
		}
		?>>
		<h4 class="helpmeout-loop-category__title">
			<?php
			echo esc_html( $category->name );

			if ( $category->count > 0 ) {
				echo apply_filters( 'woocommerce_subcategory_count_html', ' <span>(' . esc_html( $category->count ) . ')</span>', $category ); // WPCS: XSS ok.
			}
			?>
		</h4>
		<?php do_action( 'woocommerce_after_subcategory_title', $category ); ?>
		<div class="helpmeout-categoryoverlay-image-color"></div>
		<div class="clearfix-pro"></div>
		
		</a>

	</div><!-- close .progression-studios-shop-index-container -->
</li>
