<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
if ($post->post_type !== 'ignition_product') {
	return;
}
$project_id = get_post_meta($post->ID, 'ign_project_id', true);
if (empty($project_id)) {
	return;
}

$deck = new Deck($project_id);
$mini_deck = $deck->mini_deck();
?>

<?php //if ( is_front_page() || is_archive()) : #devnote top for home and /projects ?>
	
<li <?php post_class('product'); ?>>

   <?php //do_action('wpneo_campaign_loop_item_before_content'); ?>
   <?php include('wpneotemplate/woocommerce/basic/include/loop/thumbnail.php'); ?>
   <div class="progression-studios-shop-index-content">
   		<?php 
   			include('wpneotemplate/woocommerce/basic/include/loop/title.php');
   			include('wpneotemplate/woocommerce/basic/include/loop/author.php');
   			include('wpneotemplate/woocommerce/basic/include/loop/fund_raised_percent.php');
   			include('wpneotemplate/woocommerce/basic/include/loop/funding_goal.php');
   			include('wpneotemplate/woocommerce/basic/include/loop/fund_raised.php');
   			include('wpneotemplate/woocommerce/basic/include/loop/time_remaining.php');
   		?>
       	<?php //do_action('wpneo_campaign_loop_item_content'); ?>
   </div>
	
   <?php //do_action('wpneo_campaign_loop_item_after_content'); ?>
</li>

<?php /*else: ?>
<li <?php post_class('product'); ?>>
	<div class="progression-studios-shop-index-container">
		
		<?php //do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<?php //do_action( 'woocommerce_before_shop_loop_item_title' ); #devnote adds image ?>

		<div class="progression-studios-shop-index-content">
			<h2 class="woocommerce-loop-product__title"><?php echo $post->post_title; ?></h2>
			<?php //do_action( 'woocommerce_shop_loop_item_title' ); #devnote adds title ?>
			<span class="price">
				<span class="woocommerce-Price-amount amount"><?php echo $project->short_description(); ?></span>
				<span class="woocommerce-Price-amount amount"></span>
			</span>
			<?php //do_action( 'woocommerce_after_shop_loop_item_title' ); #devnote adds prices ?>
			<a href="<?php echo get_permalink(); ?>" class="button product_type_variable add_to_cart_button" aria-label="<?php _e('Select Contribution', 'multifondo-progression'); ?>" rel="nofollow"><?php _e('Select Contribution', 'multifondo-progression'); ?></a>
			<?php //do_action( 'woocommerce_after_shop_loop_item' ); #devnote adds button ?>
			
		</div><!-- close .progression-studios-shop-index-content -->
		
		
	</div><!-- close .progression-studios-shop-index-container -->
</li>

<?php endif;*/ ?>