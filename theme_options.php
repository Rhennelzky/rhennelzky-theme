<?php 

// create custom plugin settings menu
add_action('admin_menu', 'my_theme_options');

function my_theme_options() {   

    $page_title     = 'Theme Options';
    $menu_title     = 'Theme Options';
    $capability     = 'activate_plugins';
    $menu_slug      = 'theme_options';
    $function       = 'my_theme_options_page';
    $icon_url       = get_template_directory_uri() . '/menu_icon.png';
    $position       = 50;
    

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); 

    //call register settings function
    add_action( 'admin_init', 'register_my_theme_options' );
}


function register_my_theme_options() {
    //register our settings
    register_setting( 'my_theme_options_field', 'facebook' );
    register_setting( 'my_theme_options_field', 'twitter' );
    register_setting( 'my_theme_options_field', 'gplus' );
    register_setting( 'my_theme_options_field', 'instagram' );
    register_setting( 'my_theme_options_field', 'linkedin' );
    
}

function my_theme_options_page() {
?>

<div class="wrap">
<h1>Theme Options</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'my_theme_options_field' ); ?>
    <?php do_settings_sections( 'my_theme_options_field' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Facebook URL</th>
        <td><input type="text" name="facebook" value="<?php echo esc_attr( get_option('facebook') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Twitter URL</th>
        <td><input type="text" name="twitter" value="<?php echo esc_attr( get_option('twitter') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Google Plus URL</th>
        <td><input type="text" name="gplus" value="<?php echo esc_attr( get_option('gplus') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Instagram URL</th>
        <td><input type="text" name="instagram" value="<?php echo esc_attr( get_option('instagram') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">LinkedIn URL</th>
        <td><input type="text" name="linkedin" value="<?php echo esc_attr( get_option('linkedin') ); ?>" /></td>
        </tr>
         
      
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>