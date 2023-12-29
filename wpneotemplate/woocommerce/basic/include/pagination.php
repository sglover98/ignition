<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $wp_query;
$big = 999999;
$page_numb = max( 1, get_query_var('paged') );


$max_page = $wp_query->max_num_pages;
?>
<?php progression_studios_show_pagination_links_pro( ); ?>