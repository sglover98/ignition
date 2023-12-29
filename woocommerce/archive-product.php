<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php do_action( 'woocommerce_before_main_content' ); ?>
		<?php $your_shop_page = get_post( wc_get_page_id( 'shop' ) ); ?>
		
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<div id="page-title-pro">
				<div class="width-container-pro">
					<div id="progression-studios-page-title-container">
						<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
						<?php if ( is_tax( 'product_cat') || is_tax( 'product_tag') || is_search() ) : ?>
							<h4 class="progression-sub-title"><?php do_action( 'woocommerce_archive_description' ); ?></h4>
						<?php else: ?>
							<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo esc_html( get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true) );?></h4><?php endif; ?>
						<?php endif; ?>
						
					</div><!-- #progression-studios-page-title-container -->
					<div class="clearfix-pro"></div>
				</div><!-- close .width-container-pro -->
				<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '"><i class="fa fa-home"></i> </a></li>'; bcn_display_list(); echo '</ul>'; }?>
			</div><!-- #page-title-pro -->
		<?php endif; ?>
		
		<div id="content-pro">
			<div class="width-container-pro<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?>">
				<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?>
				
					<div class="woocommerce columns-<?php echo esc_attr(get_theme_mod( 'progression_studios_shop_columns', '3')); ?>">
					
						

						<?php if ( woocommerce_product_loop() ) : ?>

							<?php do_action( 'woocommerce_before_shop_loop' ); ?>

							<?php woocommerce_product_loop_start(); ?>

							<?php if ( wc_get_loop_prop( 'total' )  ) : ?>
								
								<?php while ( have_posts() ) : the_post(); ?>

									<?php 
									do_action( 'woocommerce_shop_loop' );
									wc_get_template_part( 'content', 'product' );
									?>

								<?php endwhile; // end of the loop. ?>
							<?php endif; ?>
							
							<?php woocommerce_product_loop_end(); ?>

							<?php do_action( 'woocommerce_after_shop_loop' ); ?>

						<?php else : ?>

							<?php do_action( 'woocommerce_no_products_found' ); ?>

						<?php endif; ?>

						<?php do_action( 'woocommerce_after_main_content' ); ?>	
					
					</div><!-- close .progression-studios-woocommerce -->
		

				<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #main-container-pro -->	<?php do_action( 'woocommerce_sidebar' ); ?><?php endif; ?>

			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->

<?php get_footer( 'shop' ); ?>
