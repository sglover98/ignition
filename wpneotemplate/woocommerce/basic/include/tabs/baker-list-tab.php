<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post;

$campaign_id = $post->ID;

$baker_list = WPNEOCF()->getCustomersByProduct();
?>
<table>
    <tr>
        <th><?php esc_html_e('Name', 'multifondo-progression'); ?></th>
        <th><?php esc_html_e('Donate Amount', 'multifondo-progression'); ?></th>
        <th><?php esc_html_e('Date', 'multifondo-progression'); ?></th>
    </tr>

    <?php
    foreach($baker_list as $order){
        $order = new WC_Order($order);

        if ($order->get_status() == 'completed') {
            $ordered_items = $order->get_items();
            $ordered_this_item = '';
            foreach ($ordered_items as $item) {
                if (!empty($item['item_meta']['_product_id'][0])) {
                    if ($campaign_id == $item['item_meta']['_product_id'][0])
                        $ordered_this_item = $item;
                }
            }
            ?>
            <tr>
                <td>
                    <?php
                    if (get_post_meta(get_the_ID(), 'wpneo_mark_contributors_as_anonymous', true) == "1") {
                        echo esc_html__("Anonymous", "multifondo-progression");
                    } else {
                        $mark_anonymous = get_post_meta($order->get_id(), 'mark_name_anonymous', true);
                        if ($mark_anonymous === 'true'){
                            esc_html_e('Anonymous', 'multifondo-progression');
                        }else{
                            echo esc_attr($order->get_billing_first_name()) . ' ' . $order->get_billing_last_name();
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                        echo wpneo_crowdfunding_price($order->get_total());
                    ?>
                </td>
                <td><?php echo date('F d, Y', strtotime($order->get_date_created())); ?></td>
            </tr>
            <?php
        } //if order completed
    }
    ?>
</table>
