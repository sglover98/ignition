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
<?php if ( $post->post_type == 'ignition_product') : ?>
	<li class="<?php echo esc_attr($settings['progression_elements_slider_css3_animation'] ); ?> <?php if(!empty($settings['progression_elements_post_list_cat']) && $settings['progression_elements_post_list_cat'] !== 'yes' ): ?> progression_elements_post_list_cat<?php endif ?><?php if(!empty($settings['progression_elements_post_list_author']) && $settings['progression_elements_post_list_author'] !== 'yes' ): ?> progression_elements_post_list_author<?php endif ?><?php if(!empty($settings['progression_elements_post_list_date']) && $settings['progression_elements_post_list_date'] !== 'yes' ): ?> progression_elements_post_list_date<?php endif ?>">
		
		<div class="progression-elements-slider-background" <?php if(has_post_thumbnail()): ?><?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-slider'); ?>style="background-image:url('<?php echo esc_attr($image[0]);?>')"<?php endif; ?>>
			
					<div class="helpmeout-slider-elements-display-table">
						
						
						<div class="helpmeout-slider-text-floating-container">
							<div class="helpmeout-slider-container-max-width">
							<div class="helpmeout-slider-content-floating-container">
							<div class="helpmeout-slider-content-max-width">
								<div class="helpmeout-slider-content-margins">
					
										<div class="helpmeout-slider-content-alignment">
										<div class="helpmeout-slider-progression-crowd-index-content">
										
											<?php if ( $settings['progression_elements_post_show_cat'] == 'yes') : ?>
											<?php #devnote wc_get_product_category_list( $product->get_id(), ' ', '<div class="multifondo-progression-slider-fund-cats">', '</div>' ); ?>
											<?php endif; ?>
											
											<h2 class="multifondo-progression-slider-title"><a href="<?php  echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
												
											<?php if ( $settings['progression_elements_post_showbyline'] == 'yes' ) : ?>
											<div class="multifondo-progression-slider-author"><?php esc_html_e('By','multifondo-progression'); ?> 
												<span><?php echo get_the_author(); ?></span>
											</div>
											<?php endif; ?>
												
											<?php if ( $settings['progression_elements_post_short_description'] == 'yes') : ?>
											<div class="multifondo-progression-slider-sub-title">
												<?php echo $mini_deck->project_desc; ?>
											</div>
											<?php endif; ?>
											
											
											
											
											<?php if ( $settings['progression_elements_post_display_percent_text'] == 'yes') : ?>
											<div class="multifondo-progression-slider-raised-percent">
											    <span class="multifondo-progression-slider-meta-percent" ><?php echo $mini_deck->rating_per.'%'; ?></span>
											    <?php esc_html_e('funded', 'multifondo-progression'); ?>
											</div><!-- close .multifondo-progression-slider-raised-percent -->
											<?php endif; ?>
											
											<?php if ( $settings['progression_elements_post_display_percent'] == 'yes') : ?>
											<div class="multifondo-progression-slider-raised-bar wpneo-raised-bar">
											    <div class="neo-progressbar">
											        <?php $css_width = $mini_deck->rating_per; if( $css_width >= 100 ){ $css_width = 100; } ?>
											        <div style="width: <?php echo esc_attr($css_width); ?>%"></div>
											    </div>
											</div>
											<?php endif; ?>
											
											<?php if ( $settings['progression_elements_post_display_raised'] == 'yes') : ?>
											<div class="multifondo-progression-slider-fund-raised">
													<span class="multifondo-progression-slider-raised-heading"><?php $mini_deck->p_current_sale; ?></span>
													<?php if ( $settings['progression_elements_post_display_goal'] == 'yes') : ?>
														<?php esc_html_e('raised of', 'multifondo-progression'); ?>
														<?php echo $mini_deck->item_fund_goal; ?>
														<?php esc_html_e('goal', 'multifondo-progression'); ?>
													<?php else: ?>
														<?php esc_html_e('raised', 'multifondo-progression'); ?>
													<?php endif; ?>
											</div><!-- close .multifondo-progression-slider-fund-raised -->
											<?php endif; ?>
	
											
											
											
											<?php

											#devnote $wpneo_campaign_end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);

											if ($mini_deck->end_type !== 'closed'){ ?>
												
												<?php if ( $settings['progression_elements_post_display_time_remaining'] == 'yes') : ?>
											    <div class="helpmeout-slider-time-remaining">
													 <span class="helpmeout-slider-meta-days-remaining"><?php echo $mini_deck->days_left; ?></span>
											       <?php esc_html_e('remaining days', 'multifondo-progression'); ?>
											    </div>
												 <?php endif; ?>
											<?php } ?>
											
											
		
											<?php if ( $settings['progression_main_post_play_more_btn'] ) : ?>
											<a href="<?php  echo get_permalink(); ?>" class="multifondo-progression-slider-view-project"><?php echo  wp_kses( $settings['progression_main_post_play_more_btn'] , true) ; ?></a>
											<?php endif; ?>
							
											
										   <?php do_action('wpneo_campaign_loop_item_after_content'); ?>
											
											<div class="clearfix-pro"></div>
										</div><!-- close .helpmeout-slider-progression-crowd-index-content -->
										</div><!-- close .helpmeout-slider-content-alignment -->
						
									<div class="clearfix-pro"></div>
								</div>
							</div><!-- close .helpmeout-slider-content-max-width -->
							</div><!-- close .helpmeout-slider-content-floating-container -->
							</div><!-- close .helpmeout-slider-container-max-width -->
						</div><!-- close .helpmeout-slider-text-floating-container -->

	
					</div><!-- close .helpmeout-slider-elements-display-table -->
		
			<div class="slider-background-overlay-color"></div>

			<div class="clearfix-pro"></div>
		</div><!-- close .progression-elements-slider-background -->
		
	</li>
<?php else: ?>
	
	<li class="ignitiondeck <?php echo esc_attr($settings['progression_elements_slider_css3_animation'] ); ?> <?php if($settings['progression_elements_post_list_cat'] != 'yes' ): ?> progression_elements_post_list_cat<?php endif ?><?php if($settings['progression_elements_post_list_author'] != 'yes' ): ?> progression_elements_post_list_author<?php endif ?><?php if($settings['progression_elements_post_list_date'] != 'yes' ): ?> progression_elements_post_list_date<?php endif ?>">
		
		<div class="progression-elements-slider-background" <?php if(has_post_thumbnail()): ?><?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'progression-studios-slider'); ?>style="background-image:url('<?php echo esc_attr($image[0]);?>')"<?php endif; ?>>
			
					<div class="helpmeout-slider-elements-display-table">
						
						
						<div class="helpmeout-slider-text-floating-container">
							<div class="helpmeout-slider-container-max-width">
							<div class="helpmeout-slider-content-floating-container">
							<div class="helpmeout-slider-content-max-width">
								<div class="helpmeout-slider-content-margins">
					
										<div class="helpmeout-slider-content-alignment">
										<div class="helpmeout-slider-progression-crowd-index-content">
											
											<h2 class="multifondo-progression-slider-title"><a href="<?php  echo get_permalink(); ?>"><?php echo the_title(); ?></a></h2>
												
												
											<?php if ( $settings['progression_elements_post_short_description'] == 'yes') : ?>
											<?php if( $post->post_excerpt ) : ?>
											<div class="multifondo-progression-slider-sub-title">
												<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
											</div>
											<?php endif; ?>
											<?php endif; ?>
											

											
											
		
											<?php if ( $settings['progression_main_post_play_more_btn'] ) : ?>
											<a href="<?php  echo get_permalink(); ?>" class="multifondo-progression-slider-view-project"><?php echo  wp_kses( $settings['progression_main_post_play_more_btn'] , true) ; ?></a>
											<?php endif; ?>
							
											
											
											<div class="clearfix-pro"></div>
										</div><!-- close .helpmeout-slider-progression-crowd-index-content -->
										</div><!-- close .helpmeout-slider-content-alignment -->
						
									<div class="clearfix-pro"></div>
								</div>
							</div><!-- close .helpmeout-slider-content-max-width -->
							</div><!-- close .helpmeout-slider-content-floating-container -->
							</div><!-- close .helpmeout-slider-container-max-width -->
						</div><!-- close .helpmeout-slider-text-floating-container -->

	
					</div><!-- close .helpmeout-slider-elements-display-table -->
		
			<div class="slider-background-overlay-color"></div>

			<div class="clearfix-pro"></div>
		</div><!-- close .progression-elements-slider-background -->
		
	</li>
	
<?php endif; ?>