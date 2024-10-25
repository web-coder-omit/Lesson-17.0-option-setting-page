<?php
/**
 * Plugin Name: Option setting
 * Plugin URI:  Plugin URL Link
 * Author:      Plugin Author Name
 * Author URI:  Plugin Author Link
 * Description: This plugin make for pratice wich is "Option setting".
 * Version:     0.1.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: opt_set
 */

 function plugin_file_function(){
    load_plugin_textdomain('opt_set', false, dirname(__FILE__) . "/langu");
}
add_action('plugins_loaded', 'plugin_file_function');
// Start to write code from here
add_action( 'admin_menu','opt_set_create_admin_page' );
function opt_set_create_admin_page(){
	$page_title = __('opt_set','Option table');
	$menu_title = __('Options Admin Page','opt_set');
	$capability = 'manage_options';
	$slug = 'optiondemo';
	 $callback = 'opt_set_settings_content';
	// add_options_page($page_title, $menu_title, $capability, $slug);
	add_menu_page($page_title,$menu_title,$capability,$slug,$callback);
}

function opt_set_settings_content(){
require_once plugin_dir_path(__FILE__)."form.php";
}

// require_once plugin_dir_path(_FILE_)."/form.php";

function optiondemo_save_form(){

	check_admin_referer("optiondemo");
if(isset($_POST['text_field'])){
	update_option('text_field',sanitize_text_field($_POST['text_field']));
}
wp_redirect(admin_url('admin.php?page=optiondemo'));
}

add_action('admin_post_optionsdemo_admin_page','optiondemo_save_form');



// // Settings Page: Option demo
// class Optionsdemo_Settings_Page {

// 	public function __construct() {
// 		add_action( 'admin_menu', array( $this, 'opt_set_create_settings' ) );
// 		add_action( 'admin_init', array( $this, 'opt_set_setup_sections' ) );
// 		add_action( 'admin_init', array( $this, 'opt_set_setup_fields' ) );
// 	}

// 	public function opt_set_create_settings() {
// 		$page_title = __('opt_set','Option table');
// 		$menu_title = 'Option demo';
// 		$capability = 'manage_options';
// 		$slug = 'optiondemo';
// 		$callback = array($this, 'opt_set_settings_content');
// 		add_options_page($page_title, $menu_title, $capability, $slug, $callback);
// 	}

// 	public function opt_set_settings_content() { //>
// 		<div class="wrap">
// 			<h1>Option table</h1>
// 			<?php settings_errors(); //>
// 			<form method="POST" action="options.php">
// 				<?php
// 					settings_fields( 'optiondemo' );
// 					do_settings_sections( 'optiondemo' );
// 					submit_button();
// 				//>
// 			</form>
// 		</div> <?php
// 	}

// 	public function opt_set_setup_sections() {
// 		add_settings_section( 'optiondemo_section', 'Demo for plugin setting page ', array(), 'optiondemo' );
// 	}

// 	public function opt_set_setup_fields() {
// 		$fields = array(
// 			array(
// 				'label' => 'Latitude ',
// 				'id' => 'Latitude',
// 				'type' => 'text',
// 				'section' => 'optiondemo_section',
// 			),
// 			array(
// 				'label' => 'Longitude',
// 				'id' => 'Longitude',
// 				'type' => 'text',
// 				'section' => 'optiondemo_section',
// 			),
// 			array(
// 				'label' => 'Zoom level',
// 				'id' => 'Zoom level',
// 				'type' => 'text',
// 				'section' => 'optiondemo_section',
// 			),
// 			array(
// 				'label' => 'API key',
// 				'id' => 'API key',
// 				'type' => 'text',
// 				'section' => 'optiondemo_section',
// 			),
// 			array(
// 				'label' => ' External CSS',
// 				'id' => ' External CSS',
// 				'type' => 'textarea',
// 				'section' => 'optiondemo_section',
// 			),
// 			array(
// 				'label' => 'Expire Date',
// 				'id' => 'expiredate_date',
// 				'type' => 'date',
// 				'section' => 'optiondemo_section',
// 			),
// 		);
// 		foreach( $fields as $field ){
// 			add_settings_field( $field['id'], $field['label'], array( $this, 'opt_set_field_callback' ), 'optiondemo', $field['section'], $field );
// 			register_setting( 'optiondemo', $field['id'] );
// 		}
// 	}

// 	public function opt_set_field_callback( $field ) {
// 		$value = get_option( $field['id'] );
// 		$placeholder = '';
// 		if ( isset($field['placeholder']) ) {
// 			$placeholder = $field['placeholder'];
// 		}
// 		switch ( $field['type'] ) {
// 				case 'textarea':
// 				printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>',
// 					$field['id'],
// 					$placeholder,
// 					$value
// 					);
// 					break;
// 			default:
// 				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
// 					$field['id'],
// 					$field['type'],
// 					$placeholder,
// 					$value
// 				);
// 		}
// 		if( isset($field['desc']) ) {
// 			if( $desc = $field['desc'] ) {
// 				printf( '<p class="description">%s </p>', $desc );
// 			}
// 		}
// 	}
// }
// new Optionsdemo_Settings_Page();



// End to write code from here
?>