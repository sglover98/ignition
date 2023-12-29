<?php
/**
 * WooCommerce Functions
 *
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {  add_theme_support( 'woocommerce' ); }

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Display 24 products per page. Goes in functions.php
$progression_studios_shop_count = esc_attr( get_theme_mod('progression_studios_shop_posts_Page', '9') );
add_filter( 'loop_shop_per_page', function( $cols ) { return $progression_studios_shop_count; }, 20 );


// Change number or products per row to 3
add_filter('loop_shop_columns', 'progression_studios_loop_columns');
if (!function_exists('progression_studios_loop_columns')) {
	
	function progression_studios_loop_columns() {
		$col_count_progression = esc_attr( get_theme_mod('progression_studios_shop_columns', '3') );
		return $col_count_progression; // 3 products per row
	}
}


add_filter( 'woocommerce_output_related_products_args', 'progression_studios_related_products_args' );
  function progression_studios_related_products_args( $args ) {
	  $col_count_progression = esc_attr( get_theme_mod('progression_studios_shop_related_columns', '3') );
	$args['posts_per_page'] = $col_count_progression; // 4 related products
	$args['columns'] = $col_count_progression; // arranged in 2 columns
	return $args;
}


add_theme_support( 'wc-product-gallery-slider' );


/* Adjust order on WooCommerce Post Page (Summary and Rating) */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 6 );


if ( function_exists( 'wpneo_shortcode_croudfunding_dashboard' ) ) {

	function helpmeout_progression_wc_custom_user_redirect( $redirect, $user ) {
		// Get the first of all the roles assigned to the user
		$role = $user->roles[0];
		$dashboard = md_get_durl();
		if( $role == 'administrator' ) {
			//Redirect administrators to the dashboard
			$redirect = $dashboard;
		} elseif ( $role == 'shop-manager' ) {
			//Redirect shop managers to the dashboard
			$redirect = $dashboard;
		} elseif ( $role == 'editor' ) {
			//Redirect editors to the dashboard
			$redirect = $dashboard;
		} elseif ( $role == 'author' ) {
			//Redirect authors to the dashboard
			$redirect = $dashboard;
		} elseif ( $role == 'customer' || $role == 'subscriber' ) {
			//Redirect customers and subscribers to the "My Account" page
			$redirect = $dashboard;
		} else {
			//Redirect any other role to the previous visited page or, if not available, to the home
			$redirect = wp_get_referer() ? wp_get_referer() : home_url();
		}
		return $redirect;
	}
	add_filter( 'woocommerce_login_redirect', 'helpmeout_progression_wc_custom_user_redirect', 10, 2 );


	function helpmeout_custom_registration_redirect_after_registration() {
	    return md_get_durl();
	}
	add_action('woocommerce_registration_redirect', 'helpmeout_custom_registration_redirect_after_registration', 2);

}


// Ajaxy Count Cart in Header
add_filter('woocommerce_add_to_cart_fragments', 'progression_studios_woocommerce_cart_fragment');
function progression_studios_woocommerce_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
	<div id="progression-shopping-cart-count">
	
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="progression-count-icon-nav"><i class="pe-7s-cart shopping-cart-header-icon"></i><?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?><span class="progression-cart-count"><?php echo esc_html($woocommerce->cart->cart_contents_count);?></span><?php endif ?></a>
	
		<div id="progression-checkout-basket">
			<div id="progression-check-out-basket-container">
				<div class="ajax-cart-header">
				
					<ul id="progression-cart-small">

						<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
							<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
								$_product = $cart_item['data'];
								// Only display if allowed
								if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
									continue;
								// Get price
								$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();
								$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
								?>

								<li>
									<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

										<?php echo wp_kses($_product->get_image() , true); ?>

										<div class="progression-cart-small-text">
											<h6><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></h6>
				
											<?php echo wp_kses(wc_get_formatted_cart_item_data( $cart_item ), true ); ?>

											<span class="progression-cart-small-quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>
										</div>
										<div class="clearfix-pro"></div>
									</a>
								
									<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove-cart-header" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											__( 'Remove this item', 'multifondo-progression' ),
											esc_attr( $cart_item['product_id'] ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								
									<div class="cleafix-pro"></div>
								</li>

							<?php endforeach; ?>

						<?php else : ?>
							<li class="empty"><?php esc_html_e('No products in the cart.', 'multifondo-progression'); ?></li>
						<?php endif; ?>

						</ul><!-- end product list -->
						
						<div class="cleafix-pro"></div>
						
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-button-header-cart"><?php esc_html_e('View Cart','multifondo-progression'); ?> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
						
						<div class="progression-sub-total"><?php esc_html_e('Subtotal', 'multifondo-progression'); ?>: <span class="total-number-add"><?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), true ); ?></span> </div>
						<div class="clearfix-pro"></div>

					</div>
				
				
				<div class="clearfix-pro"></div>
				</div><!-- close #progression-check-out-basket-container -->
			</div><!-- close #progression-checkout-basket -->
	
	</div>
		
		
	<?php
	$fragments['#progression-shopping-cart-count'] = ob_get_clean();
	return $fragments;

}