<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php do_action( 'woocommerce_before_main_content' ); ?>
	
	<div id="page-title-pro">
		<div class="width-container-pro">
			<div id="progression-studios-page-title-container">
				<h1 class="page-title"><h1 class="product_title entry-title"><?php the_title(); ?></h1></h1>
				<?php echo woocommerce_template_single_excerpt(); ?>
				
				<?php if ( function_exists( 'sharing_display' ) ) : ?>
					<div class="progression-studios-jetpack-styles"><?php echo sharing_display(); ?></div>
				<?php endif; ?>
				
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
		<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '"><i class="fa fa-home"></i> </a></li>'; bcn_display_list(); echo '</ul>'; }?>
	</div><!-- #page-title-pro -->
	
	<div id="content-pro">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php do_action( 'woocommerce_after_main_content' ); ?>

	</div><!-- #content-pro -->
		
<?php get_footer( 'shop' ); ?>
