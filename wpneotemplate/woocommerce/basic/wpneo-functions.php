<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/* Other forms and sortcodes Are Located in progression-elements-helpmeout plugin */


add_action('wpneo_campaign_listing_before_loop', 'campaign_listing_by_author_before_loop');
function campaign_listing_by_author_before_loop(){
    if (! empty($_GET['author'])) {
        echo '<h3>'.esc_html__('Campaigns by: ', 'multifondo-progression').' '.wpneo_crowdfunding_get_author_name_by_login(sanitize_text_field(trim($_GET['author']))).'</h3>';
    }

}
add_action('wpneo_before_crowdfunding_single_campaign_summery', 'wpneo_crowdfunding_campaign_single_love_this');



remove_action( 'wpneo_crowdfunding_single_campaign_summery', 'wpneo_crowdfunding_template_campaign_author' );




/* Other forms and sortcodes Are Located in progression-elements-helpmeout plugin */
if (! function_exists('helpmeout_lovedlogin_form')) {
function helpmeout_lovedlogin_form(){
	$notify_text 	= wp_kses( __('Please <a href="%1$s">login</a> or <a href="%2$s">register for a new account</a> in order to love projects.', 'multifondo-progression' ) , TRUE);
	$login_url 		= get_permalink( wc_get_page_id( 'myaccount' ) );
	$register_url 	= get_permalink( wc_get_page_id( 'myaccount' ) ); //get_page_link (get_option('wpneo_registration_page_id','') );
	
	$html = '<div id="helpmeeout-login-form"><div class="helpmout-bookmark-login"><i class="fa fa-lock"></i> ' . sprintf( $notify_text, $login_url, $register_url) . '</div></div>';
	return $html;
}
    
}



function wpneo_campaign_order_number_data( $min_data, $max_data, $post_id ){
    global $woocommerce, $wpdb;
    $query  =   "SELECT 
                    COUNT(p.ID)
                FROM 
                    {$wpdb->prefix}posts as p,
                    {$wpdb->prefix}woocommerce_order_items as i,
                    {$wpdb->prefix}woocommerce_order_itemmeta as im
                WHERE 
                    p.post_type='shop_order' 
                    AND p.post_status='wc-completed' 
                    AND i.order_id=p.ID 
                    AND i.order_item_id = im.order_item_id
                    AND im.meta_key='_product_id' 
                    AND im.order_item_id IN (
                                            SELECT 
                                                DISTINCT order_item_id 
                                            FROM 
                                                {$wpdb->prefix}woocommerce_order_itemmeta 
                                            WHERE 
                                                meta_key = '_line_total' 
                                                AND meta_value 
                                                    BETWEEN 
                                                        {$min_data} 
                                                        AND {$max_data}
                                            )
                    AND im.meta_value={$post_id}";
    $orders = $wpdb->get_var( $query );
    return $orders;
}

// Bio Data View
add_action( 'wp_ajax_nopriv_wpcf_bio_action', 'wpneo_bio_campaign_action' );
add_action( 'wp_ajax_wpcf_bio_action', 'wpneo_bio_campaign_action' );
function wpneo_bio_campaign_action(){
    /* if ( ! is_user_logged_in()){
        die(json_encode(array('success'=> 0, 'message' => esc_html__('Please Sign In first', 'multifondo-progression') )));
    } Allow anybody to view this content */
    
    $html = '';

	 
    $author         = sanitize_text_field($_POST['author']);
    if( $author ){

        $user_info      = get_user_meta($author);
        $creator        = get_user_by('id', $author);
        $html .= '<div class="helpmeout-modal-profile-image">';
            if( $creator->ID ){
                $img_src = '';
                $image_id = get_user_meta( $creator->ID , 'profile_image_id', true );
                if( $image_id != '' ){
                    $img_src = wp_get_attachment_image_src( $image_id, 'full' );
                    $img_src = $img_src[0];
                }
                if (!empty($img_src)){
                    $html .= '<img width="105" height="105" class="profile-avatar" srcset="'.$img_src.'" alt="avatar">';
                }
            }
        $html .= '</div>';
        $html .= '<div class="helpmeout-modal-wpneo-profile">';
		  if ( get_user_meta( $creator->ID , 'first_name', true )){
		  	$html .= '<div class="helpmeout-modal-wpneo-profile-name">'. get_user_meta( $creator->ID , 'first_name', true ) .' '. get_user_meta( $creator->ID , 'last_name', true ) .'</div>';
			}else {
				$html .= '<div class="helpmeout-modal-wpneo-profile-name">'. get_the_author_meta( 'display_name', $creator->ID ) .'</div>';
	  		}
            
            
				$html .= '<div class="helpmeout-modal-wpneo-profile-campaigns">'. count_user_posts($creator->ID, 'product') . ' ' . esc_html__( "Created Projects" , "multifondo-progression" );
				
				if ( get_theme_mod( 'progression_studios_shop_ost_bookmarks', 'on') == 'on' ){
 			  $loved_campaign_ids = array();
 			  $prev_campaign_ids = get_user_meta($creator->ID, 'loved_campaign_ids', true);
           $loved_campaign_ids = json_decode($prev_campaign_ids, true);
				
				if ( $prev_campaign_ids ){
					$html .= " <span>|</span> " . count($loved_campaign_ids) . ' '. esc_html__( "Loved Projects" , "multifondo-progression" );
				}
				}
				
        	 	$html .= '</div>';
				
            if ( get_user_meta( $creator->ID , 'profile_address', true )){
                $html .= '<div class="helpmeout-modal-wpneo-profile-location">';
                $html .= '<i class="fa fa-map-marker" aria-hidden="true"></i><span>'.get_user_meta( $creator->ID , 'profile_address', true ).'</span>';
                $html .= '</div>';
            }
		  
		  $html .= '</div><div class="clearfix-pro"></div>';
    
        if ( ! empty($user_info['profile_about'][0])){
            $html .= '<div class="helpmeout-modal-wpneo-profile-about">';
            $html .= '<h3>'.esc_html__("About","multifondo-progression").'</h3>';
            $html .= '<p>'.$user_info['profile_about'][0].'</p>';
            $html .= '</div>';
        }
    
        if ( ! empty($user_info['profile_portfolio'][0])){
            $html .= '<div class="helpmeout-modal-wpneo-profile-about">';
            $html .= '<h3>'.esc_html__("Information","multifondo-progression").'</h3>';
            $html .= '<p>'.$user_info['profile_portfolio'][0].'</p>';
            $html .= '</div>';
        }
		  
		  if ( ! empty($user_info['profile_email1'][0]) || ! empty($user_info['profile_mobile1'][0]) || ! empty($user_info['profile_fax'][0]) || ! empty($user_info['profile_website'][0])|| ! empty($user_info['profile_email1'][0]) ){
	        $html .= '<div class="helpmeout-modal-wpneo-profile-about helpmeout-modal-extra-spacing">';
	        $html .= '<h3>'.esc_html__("Contact Details","multifondo-progression").'</h3>';
           if ( ! empty($user_info['profile_mobile1'][0])){
               $html .= '<p class="helpmeout-modal-contact-paragraph"><span>'.esc_html__("Phone: ","multifondo-progression") .'</span>'.$user_info['profile_mobile1'][0].'</p>';
           }
           if ( ! empty($user_info['profile_fax'][0])){
               $html .= '<p class="helpmeout-modal-contact-paragraph"><span>'.esc_html__("Fax: ","multifondo-progression").'</span>'.$user_info['profile_fax'][0].'</p>';
           }
	            if ( ! empty($user_info['profile_email1'][0])){
	                $html .= '<p class="helpmeout-modal-contact-paragraph"><span>'.esc_html__("Email: ","multifondo-progression").'</span><a href="mailto:'. $user_info['profile_email1'][0] .'">'.$user_info['profile_email1'][0].'</a></p>';
	            }
	            if ( ! empty($user_info['profile_website'][0])){
	                $html .= '<p class="helpmeout-modal-contact-paragraph"><span>'.esc_html__("Website: ","multifondo-progression").'</span><a href="'.wpneo_crowdfunding_add_http($user_info['profile_website'][0]).'" target="_blank"> '.wpneo_crowdfunding_add_http($user_info['profile_website'][0]).' </a></p>';
	            }
	        $html .= '</div>';
	  		}
			
		if ( ! empty($user_info['profile_facebook'][0]) || ! empty($user_info['profile_twitter'][0]) || ! empty($user_info['profile_plus'][0]) || ! empty($user_info['profile_linkedin'][0]) || ! empty($user_info['profile_pinterest'][0])){
        $html .= '<div class="helpmeout-modal-wpneo-profile-social-icons">';
            $html .= '<h3>'.esc_html__("Social Media","multifondo-progression").'</h3>';
            if ( ! empty($user_info['profile_facebook'][0])){
                $html .= '<a class="wpneo-social-link" href="'.$user_info["profile_facebook"][0].'"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
            }
            if ( ! empty($user_info['profile_twitter'][0])){
                $html .= '<a class="wpneo-social-link" href="'.$user_info["profile_twitter"][0].'"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
            }
            if ( ! empty($user_info['profile_plus'][0])){
                $html .= '<a class="wpneo-social-link" href="'.$user_info["profile_plus"][0].'"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
            }
            if ( ! empty($user_info['profile_linkedin'][0])){
                $html .= '<a class="wpneo-social-link" href="'.$user_info["profile_linkedin"][0].'"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
            }
            if ( ! empty($user_info['profile_pinterest'][0])){
                $html .= '<a class="wpneo-social-link" href="'.$user_info["profile_pinterest"][0].'"><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
            }
        $html .= '</div>';
	  }
        $title = esc_html__("About the project creator","multifondo-progression");

        die(json_encode(array('success'=> 1, 'message' => $html, 'title' => $title )));
    }
}
