<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$campaign_id = $post->ID;
?>
<?php if (get_theme_mod( 'progression_studios_shop_ost_bookmarks', 'on') == 'on') : ?>
	
	<?php if ( is_user_logged_in() ) : ?>
	<div id="campaign_loved_html" class="noselect">
	    <?php is_campaign_loved_html(); ?>
	</div>
	
	<?php else: ?>
		<div id="campaign_loved_html" class="helpmeout-login-book-mark-message noselect">
		    <div id="helpmeout-pop-up"><i class="wpneo-icon wpneo-icon-love-empty"></i></div>
		</div>
	 	<?php echo helpmeout_lovedlogin_form(); ?>
	<?php endif; ?>
	
<?php endif; ?>