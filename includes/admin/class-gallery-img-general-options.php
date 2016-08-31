<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Gallery_Img_General_Options
{

    public function __construct()
    {
        add_action('gallery_img_save_general_options', array($this, 'save_options'));
    }

    /**
     * Loads General options page
     */
    public function load_page()
    {
        if (isset($_GET['page']) && $_GET['page'] == 'Options_gallery_styles') {
            if (isset($_GET['task'])) {
                if ($_GET['task'] == 'save') {
                    do_action('gallery_img_save_general_options');
                }
            } else {
                $this->show_page();
            }
        }
    }

    /**
     * Shows General options page
     */
    public function show_page()
    {
        require(GALLERY_IMG_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'gallery-img-admin-general-options-html.php');
    }

    /**
     * Save General Options
     */
    public function save_options()
    {
        if (isset($_POST['params'])) {
            $params = $_POST['params'];
            foreach ($params as $name => $value) {
                update_option($name, wp_unslash($value));
            }
            ?>
            <div class="updated"><p><strong><?php _e('Item Saved'); ?></strong></p></div>
            <?php
        }
        $this->show_page();
    }
}