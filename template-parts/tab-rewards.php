<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post;

if (empty($post)) {
    return;
}

$project_id = get_post_meta($post->ID, 'ign_project_id', true);

if (empty($project_id)) {
    return;
}

$deck = new Deck($project_id);
$the_deck = $deck->the_deck();

if (empty($the_deck)) {
    return;
}

$levels = $the_deck->level_data;
$type = get_post_meta($post->ID, 'ign_project_type', true);
$permalink_structure = get_option('permalink_structure');
if (empty($permalink_structure)) {
    $url_suffix = '&';
}
else {
    $url_suffix = '?';
}
$url = get_permalink($post->ID).$url_suffix.'purchaseform=1&prodid='.$project_id;

?>



<?php foreach ($levels as $level) { ?>
    <div class="tab-rewards-wrapper">
        <div class="level-group">
            <div class="ign-level-title">
                <h3><?php echo $level->meta_title; ?></h3>
                <div class="level-price">
                    <?php if ($type !== 'pwyw' && $level->meta_price > 0) { ?>
                        <?php echo apply_filters('id_price_selection', $level->meta_price, $id); ?>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="helpmeout-rewards-description">
                <?php echo $level->meta_short_desc; ?>
            </div>
            
            <?php if (!empty($level->meta_limit)) { ?>
                <div class="helpmeout-reewards-left">
                    <span><i class="fa fa-trophy"></i><?php _e('Limit', 'multifondo-progression'); ?>: <?php echo $level->meta_count; ?> of <?php echo $level->meta_limit; ?> <?php _e('taken', 'multifondo-progression'); ?>.</span>
                </div>
            <?php } ?>
            
            <div class="helpmeout-rewards-select_button">

                <?php if (empty($type) || $type == 'level-based') {
                    $level_invalid = getLevelLimitReached($project_id, $id, $level->id);
                    if ($the_deck->end_type == 'closed' && $the_deck->days_left <= '0') { ?>
                        <a class="level-binding"></a>
                    <?php } 
                    else { ?>
                        <a class="level-binding" <?php echo (!empty($level_invalid) ? '' : 'href="'.apply_filters('id_level_'.$level->id.'_link', $url.'&level='.$level->id, $project_id).'"'); ?>><button class="select_rewards_button"><?php _e('Select Reward', 'multifondo-progression'); ?></button></a>
                    <?php }
                } ?>
            </div>
            <?php echo do_action('id_after_level'); ?>
        </div>
    </div>
<?php } ?>
<?php echo do_action('id_widget_after', $project_id, $the_deck); ?>