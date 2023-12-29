<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post;
$user_info = get_user_meta($post->post_author);
$creator = get_user_by('id', $post->post_author);
?>

<div class="progression-studios-campaign-creator-info-wrapper">
	<a href="javascript:;" data-author="<?php echo esc_attr($post->post_author); ?>" class="wpneo-fund-modal-btn wpneo-link-style1">
    <div class="progression-studios-campaign-creator-avatar">
        <?php if ( $post->post_author ) {
            $img_src    = '';
            $image_id = get_user_meta( $post->post_author,'profile_image_id', true );
            if( $image_id != '' ){
                $img_src = wp_get_attachment_image_src( $image_id, 'backer-portfo' )[0];
            } ?>
            <?php if( $img_src ){ ?>
                <img width="80" height="80" src="<?php echo esc_attr($img_src); ?>" alt="avatar">
            <?php } else { ?>
                <?php  echo get_avatar($post->post_author, 80); ?>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="progression-studios-campaign-creator-details">
        <h5><?php echo wpneo_crowdfunding_get_author_name(); ?></h5>
        <h6><?php 
			  
			  echo count_user_posts($post->post_author, 'product');
			 
			 ?> <?php esc_html_e("Created Projects","multifondo-progression"); ?>
			 
			 <?php if (get_theme_mod( 'progression_studios_shop_ost_bookmarks', 'on') == 'on') : ?>
			 <?php 
			  $loved_campaign_ids = array();
			  $prev_campaign_ids = get_user_meta($post->post_author, 'loved_campaign_ids', true);
           $loved_campaign_ids = json_decode($prev_campaign_ids, true);
			  
			  if ($prev_campaign_ids) {
				  echo " <span>|</span> ";
				  echo count($loved_campaign_ids);
				  echo " ";
				  echo esc_html_e("Loved Projects","multifondo-progression");
			  }
			 ?>
			 <?php endif; ?>
		 </h6>
    </div>
 	</a>
	 <div class="clearfix-pro"></div>
</div>

