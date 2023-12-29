<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
?>
<div class="helpmeout-listing--index-img">
    <a href="<?php echo get_permalink(); ?>" title="<?php  echo get_the_title(); ?>"> <?php echo '<img src="'.get_the_post_thumbnail_url($post->ID, 'medium').'" class="woocommerce-placeholder wp-post-image">'; ?>
	<div class="helpmeout-overlay"><span><?php esc_html_e('View Project','multifondo-progression'); ?></span></div>
	</a>
	<?php if (get_theme_mod( 'progression_studios_shop_index_cat', 'true') == 'true') : ?>
	<?php 
	 	$project_cats = wp_get_post_terms($post->ID, 'project_category');
		if (!empty($project_cats)) {
			foreach ($project_cats as $cat) {
				echo '<div class="multifondo-progression-index-fund-cats"><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></div>';
			}
		}
	?>
	<?php //echo wc_get_product_category_list( $post->ID ), ' ', '<div class="multifondo-progression-index-fund-cats">', '</div>' ); ?>
	<?php endif; ?>
</div>