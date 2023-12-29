<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
get_header('shop');

do_action( 'wpneo_before_crowdfunding_single_campaign' );


?>

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
	<?php if ( post_password_required()) : ?>
	<div class="width-container-pro"><?php  echo get_the_password_form(); ?></div>
	<?php else: ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
		
       <?php do_action( 'wpneo_before_main_content' ); ?>
       <div itemscope itemtype="http://schema.org/ItemList" id="campaign-<?php the_ID(); ?>" <?php post_class(); ?>>
			 <div id="single-product-info-background">
		 		<div class="width-container-pro">
					<div class="woocommerce woocommerce-shop-single">
						 

						 
						<div class="helpmeout-image-container-product">
							<?php do_action( 'wpneo_before_crowdfunding_single_campaign_summery' ); ?>
							<div class="clearfix-pro"></div>
							<ul class="helpmeout-locatin-category-tags">
								
								<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<li class="multifondo-progression-campaign-categories"><i class="fa fa-folder-open" aria-hidden="true"></i>', '</li>' ); ?>
								
								<!-- ?php echo wc_get_product_category_list( $product->get_id(), ', ', '<li class="multifondo-progression-campaign-tags"><i class="fa fa-tags" aria-hidden="true"></i>', '</li>' ); ? -->
								<?php if (wpneo_crowdfunding_get_campaigns_location()){ ?>
									<li class="multifondo-progression-campaign-location">
										<i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo wpneo_crowdfunding_get_campaigns_location(); ?></span>
									</li>
								<?php } ?>
							</ul>
							<div class="clearfix-pro"></div>
						</div><!-- close .helpmeout-image-container-produc -->
	 					<div class="summary entry-summary">
						<div class="clearfix-pro"></div>
	 						<div class="progression-woocommerce-product-short-summary">
	  		             <div class="progression-studios-campaign-summary">
	  		                 <div class="progression-studios-campaign-summary-inner" itemscope itemtype="http://schema.org/DonateAction">
	  		                     <?php do_action( 'wpneo_crowdfunding_single_campaign_summery' ); ?>
										<div class="clearfix-pro"></div>
	  		                 </div><!-- .progression-studios-campaign-summary-inner -->
	  		             </div><!-- .progression-studios-campaign-summary -->
	 						</div><!-- close .progression-woocommerce-product-short-summary -->
							
	 					</div><!-- .summary -->
						 
						<div class="clearfix-pro"></div>
					</div><!-- close .woocommerce-shop-single -->
				</div><!-- close .width-container-pro -->
			</div><!-- close #single-product-info-background -->
			 
          
	 		<div id="single-product-tabs-background">
	 			<div class="width-container-pro">
	 				<div class="woocommerce woocommerce-shop-single">
	 					<div id="woocomerce-tabs-container-progression-studios">
							
							<?php do_action( 'wpneo_after_crowdfunding_single_campaign_summery' ); ?>
							<meta itemprop="url" content="<?php the_permalink(); ?>" />
							
						</div><!-- close #woocomerce-tabs-container-progression-studios -->
					</div><!-- close .woocommerce -->
					<div class="clearfix-pro"></div>
				</div><!-- close .width-container-pro -->
			</div><!-- close #single-product-tabs-background -->

       </div><!-- #campaign-<?php the_ID(); ?> -->
       <?php do_action( 'wpneo_after_crowdfunding_single_campaign' ); ?>
       <?php do_action( 'wpneo_after_main_content' ); ?>
   <?php endwhile; // end of the loop. ?>

<?php endif; ?>
</div><!-- close #content-pro -->

<?php get_footer('shop'); ?>