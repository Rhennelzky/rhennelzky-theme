<?php
function theme_customize_register($wp_customize){
    
    $wp_customize->add_section('footer_color_title', array(
        'title'    => __('Footer Color', 'converging_solutions'),
        'description' => '',
        'priority' => 120,
    ));
 
    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('footer_color', array(

        'default'        => 'black'

    ));
 
    $wp_customize->add_control('footer_color', array(
    	
        'label'       => 'Color Scheme',
        'section'    => 'footer_color_title',        
        'type'       => 'radio',
        'choices'    => array(
            'black' => 'Black',
            '#02AED6' => 'Sky Blue'            
        ),
    ));
 
    
}

add_action('customize_register', 'theme_customize_register');

?>