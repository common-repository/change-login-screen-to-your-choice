<?php
   /*
   Plugin Name: change login screen to your text
   Description: this plugin change your login screen and change howdy to your text in Wordpress dashboard.
   Version: 1.2
   Author: Manoj kumar
   License: GPL2
   */
 
//add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);

	//create new top-level menu
	//add_menu_page('howdy Plugin Settings', 'howdy-settings', 'administrator', __FILE__, 'howdy_settings_page',plugins_url('/images/icon5.png', __FILE__));
//add_submenu_page('edit.php?post_type=page', 'settings', 'Settings', 'manage_options', 'event_settings', array(&$this,'show_menu'));


	//call register settings function
	
	add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
	add_options_page('My Options', 'My Plugin', 'manage_options', 'my-plugin.php', 'my_plugin_page');
add_action( 'admin_init', 'register_mysettings' );
}
function register_mysettings() {
	include('form.php');	//register our settings
	register_setting( 'baw-settings-group', 'Replace_text' );
	register_setting( 'baw-settings-group', 'login_username' );
	register_setting( 'baw-settings-group', 'login_logo' );
	register_setting( 'baw-settings-group', 'option_name' );

	
}
//for change image logo
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_option('login_logo'); ?>);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function replace_howdy( $wp_admin_bar ) {
	//$welcome=echo get_option('Replace_text');
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', get_option('Replace_text'), $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

function login_with_email_address($username) {
        $user = get_user_by('email',$username);
        if(!empty($user->user_login))
                $username = $user->user_login;
        return $username;
}
add_action('wp_authenticate','login_with_email_address');
function change_username_wps_text($text){
       if(in_array($GLOBALS['pagenow'], array('wp-login.php'))){
         if ($text == 'Username'){$text = get_option('login_username');}
            }
                return $text;
         }
add_filter( 'gettext', 'change_username_wps_text' );



add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
$cc=get_option('option_name');
foreach($cc as $arr)
{
  if($arr==administrator OR author OR subscriber OR contributor OR editor)

{

  if (current_user_can($arr) )

{
  show_admin_bar(false);
}
}
else if($arr==123)
{
show_admin_bar(true);
}
else if($arr==159)
{
show_admin_bar(false);
}
}
}


function hrww_enqueue() {

  wp_enqueue_style('thickbox');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  // I also changed the path, since I was using it directly from my theme and not as a plugin
  wp_enqueue_script('hrww',plugins_url( 'image.js', __FILE__ ));
}
add_action('admin_enqueue_scripts', 'hrww_enqueue');
?>
<?php
function myplugin_deactivate(){
 update_option( 'Replace_text','Howdy,');
 update_option( 'login_username','Username');
}
register_deactivation_hook( __FILE__, 'myplugin_deactivate' );

?>
