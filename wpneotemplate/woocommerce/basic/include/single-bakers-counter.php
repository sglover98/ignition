<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div class="wpneo-single-sidebar">
    <h3><?php echo WPNEOCF()->totalBackers(); ?></h3>
    <p><?php esc_html_e('People backed this so far','multifondo-progression'); ?></p>
</div>