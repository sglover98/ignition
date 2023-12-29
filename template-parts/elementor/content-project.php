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
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
if (empty($post)) {
	return;
}
$project_id = get_post_meta($post->ID, 'ign_project_id', true);
$deck = new Deck($project_id);
$mini_deck = $deck->mini_deck();
?>
<div class="multifondo-progression-crowdfunding-elementor">

	<?php if ( $post->post_type == 'ignition_product') : ?>
	
	
		<div class="helpmeout-listing--index-img">
		    <a href="<?php echo get_permalink(); ?>" title="<?php  echo get_the_title(); ?>"> <?php echo '<img src="'.get_the_post_thumbnail_url($post->ID).'" class="woocommerce-placeholder wp-post-image">'; ?>
			 <?php if ( !empty($settings['progression_main_post_play_more_btn'])) : ?><div class="helpmeout-overlay"><span><?php echo wp_kses( $settings['progression_main_post_play_more_btn'] , true) ; ?></span></div><?php endif; ?>
			 </a>
			 <?php if ( !empty($settings['progression_elements_post_show_cat']) && $settings['progression_elements_post_show_cat'] == 'yes') : ?>
			 	<?php 
				$project_cats = wp_get_post_terms($post->ID, 'project_category');
				if (!empty($project_cats)) {
					foreach ($project_cats as $cat) {
						echo '<div class="multifondo-progression-index-fund-cats"><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></div>';
					}
				} ?>
			 <?php endif; ?>
		</div>
	
	   <div class="progression-studios-shop-index-content">
			<a href="<?php echo get_permalink(); ?> "><h2 class="woocommerce-loop-product__title"><?php echo get_the_title(); ?></h2></a>
			
			<?php if ( !empty($settings['progression_elements_post_showbyline']) && $settings['progression_elements_post_showbyline'] == 'yes' ) : ?>
			<div class="helpmeout-index-author"><?php esc_html_e('By','multifondo-progression'); ?> 
				<span><?php echo get_the_author(); ?></span>
			</div>
			<?php endif; ?>
			<?php if ( (!empty($settings['progression_elements_post_display_percent_text']) && $settings['progression_elements_post_display_percent_text'] == 'yes') && (!empty($settings['progression_elements_post_meta_category_place']) && $settings['progression_elements_post_meta_category_place'] == 'above'  )) : ?>
			<div class="helpmeout-index-raised-percent">
			    <span class="helpmeout-index-meta-percent" ><?php echo $mini_deck->rating_per; ?></span>
			    <?php esc_html_e('funded', 'multifondo-progression'); ?>
			</div><!-- close .helpmeout-index-raised-percent -->
			<?php endif; ?>
			
			<?php if ( !empty($settings['progression_elements_post_display_percent']) && $settings['progression_elements_post_display_percent'] == 'yes') : ?>
			<div class="helpmeout-campaign-index wpneo-raised-bar">
			    <div class="neo-progressbar">
			        <?php $css_width = $mini_deck->rating_per; if( $css_width >= 100 ){ $css_width = 100; } ?>
			        <div style="width: <?php echo esc_attr($css_width); ?>%"></div>
			    </div>
			</div>
			<?php endif; ?>
			
			<?php if ( $settings['progression_elements_post_display_raised'] == 'yes') : ?>
				
			<div class="helpmeoutindex-fund-raised">
					<span class="helpmeoutindex-raised-heading"><?php echo $mini_deck->p_current_sale; ?></span>
					<?php if ( !empty($settings['progression_elements_post_display_goal']) && $settings['progression_elements_post_display_goal'] == 'yes' && !empty($mini_deck->item_fund_goal)) : ?>
						<?php esc_html_e('raised of', 'multifondo-progression'); ?>
						<?php echo $mini_deck->item_fund_goal; ?>
						<?php esc_html_e('goal', 'multifondo-progression'); ?>
					<?php else: ?>
						<?php esc_html_e('raised', 'multifondo-progression'); ?>
					<?php endif; ?>
			</div><!-- close .helpmeoutindex-fund-raised -->
			<?php endif; ?>

			
			<?php if ( (!empty($settings['progression_elements_post_display_percent_text']) && $settings['progression_elements_post_display_percent_text'] == 'yes') && (!empty($settings['progression_elements_post_meta_category_place']) && $settings['progression_elements_post_meta_category_place'] == 'below')) : ?>
				<?php if( !empty($mini_deck->item_fund_goal) ) : ?>
			<div class="helpmeout-index-raised-percent">
			    <span class="helpmeout-index-meta-percent" ><?php echo $mini_deck->rating_per; ?></span>
			    <?php esc_html_e('funded', 'multifondo-progression'); ?>
			</div><!-- close .helpmeout-index-raised-percent -->
				<?php endif; ?>
			<?php endif; ?>
			
			<?php

			if ($mini_deck->end_type !== 'open'){ ?>
	
				<?php if ( !empty($settings['progression_elements_post_display_time_remaining']) && $settings['progression_elements_post_display_time_remaining'] == 'yes') : ?>
			    <div class="helpmeout-index-time-remaining">
					 <span class="helpmeout-index-meta-days-remaining"><?php echo $mini_deck->days_left; ?></span>
			       <?php esc_html_e('remaining days', 'multifondo-progression'); ?>
			    </div>
				 <?php endif; ?>
			<?php } ?>
	
	   </div>
	
	   <?php do_action('wpneo_campaign_loop_item_after_content'); ?>


	<?php else: ?>
		<div class="progression-studios-shop-index-container">

			<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

			<div class="progression-studios-shop-index-content">
				<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
				<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
			
				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			
			</div><!-- close .progression-studios-shop-index-content -->
		
		
		</div><!-- close .progression-studios-shop-index-container -->

	<?php endif; ?>
</div><!-- close .multifondo-progression-crowdfunding-elementor -->