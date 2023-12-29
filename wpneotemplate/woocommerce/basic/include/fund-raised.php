<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$wpneo_campaign_end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);
?>


  <div class="multifondo-progression-funding-so-far">
 	  <?php echo wpneo_crowdfunding_price(wpneo_crowdfunding_get_total_fund_raised_by_campaign()); ?>
  </div><!-- close .multifondo-progression-funding-so-fa -->
  
  
  
  
  <?php if( get_post_meta($post->ID, '_nf_funding_goal', true) != 0 ) : ?>
  <div class="multifondo-progression-fund-small">
  		<?php esc_html_e('raised of', 'multifondo-progression') ?> <span class="multifondo-progression-raised-goal-total"><?php echo wpneo_crowdfunding_price(wpneo_crowdfunding_get_total_goal_by_campaign(get_the_ID())); ?></span> <?php esc_html_e('goal', 'multifondo-progression') ?>
  </div>
  <?php else: ?>
  <div class="multifondo-progression-fund-small">
  		<?php esc_html_e('raised', 'multifondo-progression') ?>
  </div>
  <?php endif; ?>
  
  <?php if ($wpneo_campaign_end_method != 'never_end'){
      ?>
		<div class="multifondo-progression-fund-days">
          <div class="helpmeout-funding-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo WPNEOCF()->dateRemaining(); ?></div>
          <div class="helpmeout-funding-date-text"><?php esc_html_e( 'remaining days','multifondo-progression' ); ?></div>
		 </div>
  <?php } ?>