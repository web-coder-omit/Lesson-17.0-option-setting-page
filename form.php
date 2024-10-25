<h1>Option Page</h1>
<form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
    <?php wp_nonce_field('optiondemo'); ?>
    <label for="text_field"><?php _e('Text Field:', 'opt_set'); ?></label>
    <input type="text" id="text_field" name="text_field" value="<?php echo esc_attr(get_option('text_field')); ?>"/>
    <input type="hidden" name="action" value="optionsdemo_admin_page">
    <?php submit_button('Save'); ?>
</form>


