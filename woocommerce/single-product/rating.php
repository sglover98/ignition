<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating">
		<?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>

			
			<?php if ( comments_open() ) : ?>	
			
				<span class="progression-studios-rating-divider"></span>
			
				<span class="progression-studios-product-rating-count"><?php printf( _n( '%s review', '%s reviews', $review_count, 'multifondo-progression' ), '<span itemprop="reviewCount">' . $review_count . '</span>' ); ?></span>
			
				<span class="progression-studios-rating-divider remove-on-quick-view"></span>
			
				<a href="#reviews" class="woocommerce-review-link" rel="nofollow"><?php echo esc_html__( 'Add your review', 'multifondo-progression' ); ?></a>
			<?php endif ?>
	</div>

<?php endif; ?>