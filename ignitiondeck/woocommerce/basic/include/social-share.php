<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<?php
$post_id = get_the_ID();
$link = get_permalink( $post_id );
$title = get_the_title( $post_id );
$twitter_via = get_option('wpneo_twitter_via','');
$linkedin_via = get_option('wpneo_linkedin_via','');
$description = apply_filters('the_excerpt', get_post_field('post_excerpt', $post_id));
$post_thumbnail_url = '';
if ( has_post_thumbnail() ) {
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
}
?>

<div class="social-container">
<span><?php esc_html_e('Share: ','multifondo-progression'); ?></span>
    <div class="links">
        <?php if(get_option('wpneo_twitter_social_share')=='true'): ?>
            <a href="#" data-type="twitter" data-url="<?php echo esc_attr($link); ?>" data-description="<?php echo esc_attr($title); ?>" data-via="<?php echo esc_attr($twitter_via); ?>" class="prettySocial"><i class="wpneo-icon wpneo-icon-twitter"></i></a>
        <?php endif; ?>
        <?php if(get_option('wpneo_facebook_social_share')=='true'): ?>
            <a href="#" data-type="facebook" data-url="<?php echo esc_attr($link); ?>" data-title="<?php echo esc_attr($title); ?>" data-media="<?php echo esc_attr($post_thumbnail_url); ?>" class="prettySocial"><i class="wpneo-icon wpneo-icon-facebook"></i> </a>
        <?php endif; ?>
        <?php if(get_option('wpneo_googleplus_social_share')=='true'): ?>
            <a href="#" data-type="googleplus" data-url="<?php echo esc_attr($link); ?>" data-description="<?php echo esc_attr($title); ?>" class="prettySocial"><i class="wpneo-icon wpneo-icon-gplus"></i></a>
        <?php endif; ?>
        <?php if(get_option('wpneo_pinterest_social_share')=='true'): ?>
            <a href="#" data-type="pinterest" data-url="<?php echo esc_attr($link); ?>" data-description="<?php echo esc_attr($title); ?>" data-media="<?php echo esc_attr($post_thumbnail_url); ?>" class="prettySocial"><i class="wpneo-icon wpneo-icon-pinterest"></i></a>
        <?php endif; ?>
        <?php if(get_option('wpneo_linkedin_social_share')=='true'): ?>
            <a href="#" data-type="linkedin" data-url="<?php echo esc_attr($link); ?>" data-title="<?php echo esc_attr($title); ?>" data-description="<?php echo esc_attr($description); ?>" data-via="<?php echo esc_attr($linkedin_via); ?>" data-media="<?php echo esc_attr($post_thumbnail_url); ?>" class="prettySocial"><i class="wpneo-icon wpneo-icon-linkedin"></i></a>
        <?php endif; ?>
        <?php if(get_option('wpneo_embed_social_share')=='true'): ?>
            <a href="javascript:;" class="embedlink" data-postid="<?php echo esc_attr($link); ?>"><i class="wpneo-icon wpneo-icon-embed" data-postid="<?php echo esc_attr($post_id); ?>"></i></a>
        <?php endif; ?>
    </div>
    <script type="text/javascript">
        jQuery( document ).ready(function( $ ) {
            $(".prettySocial").prettySocial();
        });
    </script>
</div>
