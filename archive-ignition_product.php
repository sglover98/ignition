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

global $post;

get_header(); ?>

	<?php do_action( 'woocommerce_before_main_content' ); ?>
	
		<div id="page-title-pro">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<h1 class="page-title"><?php echo apply_filters('project_archive_title', __('All Projects', 'multifondo-progression')); ?></h1>					
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
			<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '"><i class="fa fa-home"></i> </a></li>'; bcn_display_list(); echo '</ul>'; }?>
		</div><!-- #page-title-pro -->
		
		<div id="content-pro">
			<div class="width-container-pro<?php if(get_post_meta($post->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?>">
				<?php if('right-sidebar' == 'right-sidebar' || get_post_meta($post->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?>
				
					<div class="woocommerce columns-<?php echo esc_attr(get_theme_mod( 'progression_studios_shop_columns', '3')); ?>">

							<ul class="products columns-<?php echo esc_attr(get_theme_mod( 'progression_studios_shop_columns', '3')); ?>">
							<?php //do_action( 'woocommerce_before_shop_loop' ); ?>

							<?php //woocommerce_product_loop_start(); ?>
								
								<?php while ( have_posts() ) : the_post(); ?>

									<?php 
									//do_action( 'woocommerce_shop_loop' );
									get_template_part( 'content', 'project' );
									?>

								<?php endwhile; // end of the loop. ?>
							
							<?php //woocommerce_product_loop_end(); ?>

							<?php //do_action( 'woocommerce_after_shop_loop' ); ?>

						<?php //do_action( 'woocommerce_after_main_content' ); ?>	
							</ul>
					</div><!-- close .progression-studios-woocommerce -->
		

				</div><!-- close #main-container-pro -->

			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->

<?php get_footer(); ?>
