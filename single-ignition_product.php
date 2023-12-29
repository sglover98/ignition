<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$project_id = get_post_meta($post->ID, 'ign_project_id', true);
$project = new ID_Project($project_id);
$deck = new Deck($project_id);
$hdeck = $deck->hDeck();
$the_deck = $deck->the_deck(); #devenote used for lightbox may be a way to avoid loading this
$prefix = idf_get_querystring_prefix();
$updates = apply_filters('multifondo_updates', do_shortcode( '[project_updates product="'.$project_id.'"]'));
$faqs = apply_filters('multifondo_faq', do_shortcode( '[project_faq product="'.$project_id.'"]'));
$video = the_project_video($post->ID);
$thumbnail = ID_Project::get_project_thumbnail($post->ID);
//return idf_handle_video($video);
//do_action('fh_hDeck_before'); #devnote
get_header();

//do_action( 'wpneo_before_crowdfunding_single_campaign' ); #devnote


?>

	<div id="page-title-pro">
		<div class="width-container-pro">
			<div id="progression-studios-page-title-container">
				<h1 class="page-title"><h1 class="product_title entry-title"><?php the_title(); ?></h1></h1>
				<h4 class="progression-sub-title" itemprop="description">
					<p><?php echo $project->short_description(); ?></p>
				</h4>
				<div class="progression-studios-jetpack-styles"></div>
			</div><!-- #progression-studios-page-title-container -->
			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #page-title-pro -->
	

<div id="content-pro">
	<?php if ( post_password_required()) : ?>
	<div class="width-container-pro"><?php  echo get_the_password_form(); ?></div>
	<?php elseif (isset($_GET['purchaseform'])) : ?>
		<?php
		echo apply_filters('the_content', do_shortcode('[project_purchase_form]'));
		?>
	<?php else: ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
		
       <?php //do_action( 'wpneo_before_main_content' ); ?>
       <div itemscope itemtype="http://schema.org/ItemList" id="campaign-<?php the_ID(); ?>" <?php post_class('product'); ?>>
			 <div id="single-product-info-background">
		 		<div class="width-container-pro">
					<div class="woocommerce woocommerce-shop-single">
						 
						<div class="helpmeout-image-container-product">
							<div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;">
								<figure class="woocommerce-product-gallery__wrapper">
									<div data-thumb="<?php echo $thumbnail; ?>" class="woocommerce-product-gallery__image <?php echo (!empty($video) ? 'hasvideo' : ''); ?>" style="background-image: url(<?php echo $thumbnail; ?>)">
										<?php echo $video; ?>
									</div>
								</figure>
							</div>


							<?php //do_action( 'wpneo_before_crowdfunding_single_campaign_summery' ); ?>
							<div class="clearfix-pro"></div>
							<ul class="helpmeout-locatin-category-tags">
								<?php 
									$project_cats = wp_get_post_terms($post->ID, 'project_category');
									if (!empty($project_cats)) {
										foreach ($project_cats as $cat) {
											echo '<li class="multifondo-progression-campaign-categories"><i class="fa fa-folder-open" aria-hidden="true"></i><a href="#">'.$cat->name.'</a></li>';
										}
									}
								?>
								
								<?php if (is_id_pro()) {
									$user_meta = get_user_meta($post->post_author);
									$location = ide_company_location($user_meta, $post->ID);
								?>
									<li class="multifondo-progression-campaign-location">
										<i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo $location; ?></span>
									</li>
								<?php } ?>
							</ul>
							<div class="progression-studios-jetpack-styles">
								<?php do_action('idf_general_social_buttons', $id, $project_id); ?>
							</div>
							<div class="clearfix-pro"></div>
						</div><!-- close .helpmeout-image-container-produc -->
	 					<div class="summary entry-summary">
							<div class="clearfix-pro"></div>
	 						<div class="progression-woocommerce-product-short-summary">
	  		            		<div class="progression-studios-campaign-summary">
	  		                		<div class="progression-studios-campaign-summary-inner" itemscope itemtype="http://schema.org/DonateAction">
	  		                     		<?php //do_action( 'wpneo_crowdfunding_single_campaign_summery' ); ?>
	  		                     		<div class="progression-studios-campaign-summary">
	  		                 				<div class="progression-studios-campaign-summary-inner" itemscope="" itemtype="http://schema.org/DonateAction">
	  		                    				<!--  Added to single-crowdfunding.php template -->
  												<div class="multifondo-progression-funding-so-far">
 	  												<span class="woocommerce-Price-amount amount"><?php echo $hdeck->total; ?></span>
 	  											</div><!-- close .multifondo-progression-funding-so-fa -->
    											<div class="multifondo-progression-fund-small">
  														<?php _e('raised of ', 'multifondo-progression'); ?><span class="multifondo-progression-raised-goal-total">
  													<span class="woocommerce-Price-amount amount"><?php echo $hdeck->goal; ?></span></span> <?php _e('goal', 'multifondo-progression'); ?>
  												</div>
  												<?php if ($hdeck->end_type == 'closed') { ?>
		  												<div class="multifondo-progression-fund-days">
		          											<div class="helpmeout-funding-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo esc_attr($the_deck->days_left); ?></div>
		          											<div class="helpmeout-funding-date-text"><?php esc_html_e('remaining days', 'multifondo-progression'); ?></div>
				 										</div>
			 									<?php } ?>
												<div class="multifondo-progression-fund-backers">
												   	<div class="helpmeout-funding-backers"><i class="fa fa-users" aria-hidden="true"></i><?php echo $hdeck->pledges; ?></div>
													<div class="helpmeout-funding-backers-text"><?php _e('backers', 'multifondo-progression'); ?></div>
												</div>
												<div class="wpneo-raised-percent">
												    <div class="wpneo-meta-desc"><?php echo $hdeck->percentage; ?>%</div>
												    <div class="wpneo-meta-name">funded</div>
												</div>
												<div class="wpneo-raised-bar">
												    <div class="neo-progressbar">
												        <div style="width: <?php echo $hdeck->percentage; ?>%"></div>
												    </div>
												</div>
												<div class="ign-supportnow wpneo-single-sidebar">
										            <a href="<?php echo get_permalink($post->ID).$prefix.'purchaseform=1&prodid='.$project_id; ?>"><button class="wpneo_donate_button"><?php _e('Back this Project', 'multifondo-progression'); ?></button></a>
		            							</div><!-- moved this to featured-image.php file -->
												<div class="progression-studios-campaign-creator-info-wrapper">
													<a href="javascript:;" data-author="1" class="wpneo-fund-modal-btn wpneo-link-style1">
	    												<div class="progression-studios-campaign-creator-avatar">
	                                    					<img alt="" src="<?php echo get_avatar_url($post->post_author); ?>" class="avatar avatar-80 photo" height="80" width="80">
	                                    				</div>
	    												<div class="progression-studios-campaign-creator-details">
	    													<?php
	    													$creator_args = array(
																'post_type' => 'ignition_product',
																'author' => $post->post_author,
																'posts_per_page' => -1,
																'post_status' => array('draft', 'pending', 'publish')
															);
															$count = count(apply_filters('id_creator_projects', get_posts(apply_filters('id_creator_args', $creator_args))));
	    													?>
	        												<h5><?php echo get_the_author(); ?></h5>
	        												<h6><?php echo $count; ?> Created Projects</h6>
	    												</div>
 													</a>
	 												<div class="clearfix-pro"></div>
												</div>
												<div class="clearfix-pro"></div>
	  		                 				</div><!-- .progression-studios-campaign-summary-inner -->
	  		             				</div>
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
							
							<?php //do_action( 'wpneo_after_crowdfunding_single_campaign_summery' ); ?>




							<div class="woocommerce-tabs wc-tabs-wrapper">
								<ul class="tabs wc-tabs" role="tablist">
                            		<li class="description_tab active" id="tab-title-description" role="tab" aria-controls="tab-description">
                    					<a href="#tab-description"><?php _e('Campaign Story', 'multifondo-progression'); ?></a>
                					</li>
                					<li class="reviews_tab" id="tab-title-baker_list" role="tab" aria-controls="tab-baker_list">
                    					<a href="#tab-baker_list"><?php _e('Backer List', 'multifondo-progression'); ?></a>
                					</li>
                					<?php if (!empty($faqs)) { ?>
	                					<li class="reviews_tab" id="tab-title-faq" role="tab" aria-controls="tab-faq">
	                    					<a href="#tab-faq"><?php _e('FAQ', 'multifondo-progression'); ?></a>
	                					</li>
                					<?php } ?>
                					<?php if (!empty($updates)) { ?>
	                					<li class="reviews_tab" id="tab-title-updates" role="tab" aria-controls="tab-updates">
	                    					<a href="#tab-updates"><?php _e('Updates', 'multifondo-progression'); ?></a>
	                					</li>
                					<?php } ?>
                					<?php if (comments_open($post->ID)) { ?>
	                           			<li class="reviews_tab" id="tab-title-comments" role="tab" aria-controls="tab-comments">
	                    					<a href="#tab-comments"><?php _e('Comments', 'multifondo-progression'); ?></a>
	                					</li>
                					<?php } ?>
                    			</ul>
  			  					<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="">
  									<div class="tab-description tab_col_9 tab-campaign-story-left">
    									<h2><?php _e('Campaign Story', 'multifondo-progression'); ?></h2>
    									<p><?php echo apply_filters('fh_project_content', get_post_meta($post->ID, 'ign_project_long_description', true), $project_id); ?></p>
									</div>
									<div class="tab-rewards tab_col_3 tab-campaign-story-right">
										<?php get_template_part('template-parts/tab', 'rewards'); ?>
								    	<div style="clear: both"></div>	<div style="clear: both"></div>
									</div>

  								</div>
  								<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--baker_list panel entry-content wc-tab" id="tab-baker_list" role="tabpanel" aria-labelledby="tab-title-baker_list" style="display: none;">
									<?php do_action('multifondo_backers_list', $project_id, $post->ID); ?>
  								</div>
  								<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--faq panel entry-content wc-tab" id="tab-faq" role="tabpanel" aria-labelledby="tab-title-faq" style="display: none;">
									<?php echo apply_filters('multifondo_faq', do_shortcode( '[project_faq product="'.$project_id.'"]')); ?>
  								</div>
  								<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--updates panel entry-content wc-tab" id="tab-updates" role="tabpanel" aria-labelledby="tab-title-updates" style="display: none;">
									<?php echo apply_filters('multifondo_updates', do_shortcode( '[project_updates product="'.$project_id.'"]')); ?>
  								</div>
  								<?php if (comments_open($post->ID)) { ?>
	  								<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--comments panel entry-content wc-tab" id="tab-comments" role="tabpanel" aria-labelledby="tab-title-comments" style="display: none;">
	  									<div id="reviews" class="woocommerce-Reviews">
											<div id="comments">
												<?php comments_template('/comments.php', true); ?>
											</div>
											<div class="clear"></div>
										</div>
	  								</div>
  								<?php } ?>
  			   				</div>
							<meta itemprop="url" content="<?php the_permalink(); ?>" />
							
						</div><!-- close #woocomerce-tabs-container-progression-studios -->
					</div><!-- close .woocommerce -->
					<div class="clearfix-pro"></div>
				</div><!-- close .width-container-pro -->
			</div><!-- close #single-product-tabs-background -->

       </div><!-- #campaign-<?php the_ID(); ?> -->
       <?php //do_action( 'wpneo_after_crowdfunding_single_campaign' ); ?>
       <?php //do_action( 'wpneo_after_main_content' ); ?>
   <?php endwhile; // end of the loop. ?>

<?php endif; ?>
</div><!-- close #content-pro -->

<?php get_footer(); ?>