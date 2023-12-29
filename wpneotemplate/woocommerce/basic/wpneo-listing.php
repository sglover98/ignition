<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$col_num = get_option('number_of_collumn_in_row', 3);
$number = array( "2"=>"two","3"=>"three","4"=>"four" );
?>
<div class="woocommerce columns-<?php echo esc_attr(get_theme_mod( 'progression_studios_shop_columns', '3')); ?>">
	
<div class="wpneo-wrapper">
        <?php do_action('wpneo_campaign_listing_before_loop'); ?>
        <ul class="products">
            <?php if (have_posts()): ?>
                <?php
                $i = 1;
                while (have_posts()) : the_post();
                    $class = '';
                    if( $i == $col_num ){
                        $class = 'last';
                        $i = 0;
                    }
                    if($i == 1){ $class = 'first'; }
                ?>
                    <li <?php post_class(); ?>>
							  
                        <?php do_action('wpneo_campaign_loop_item_before_content'); ?>
								
                        <div class="progression-studios-shop-index-content">
                            <?php do_action('wpneo_campaign_loop_item_content'); ?>
                        </div>
								
                        <?php do_action('wpneo_campaign_loop_item_after_content'); ?>
                    </li>
                <?php $i++; endwhile; ?>
            <?php
            else:
                wpneo_crowdfunding_load_template('include/loop/no-campaigns-found');
            endif;
            ?>
        </ul>
        <?php do_action('wpneo_campaign_listing_after_loop'); ?>
        <?php
        wpneo_crowdfunding_load_template('include/pagination');
        ?>
</div>


</div><!-- close .progression-studios-woocommerce -->