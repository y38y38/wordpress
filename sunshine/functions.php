<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'id' => 'sidebar-1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    ));
}



include( get_template_directory().'/functions_camera_spacs.php' );
include( get_template_directory().'/functions_video_spacs.php' );
include( get_template_directory().'/functions_link_spacs.php' );
include( get_template_directory().'/functions_database.php' );
include( get_template_directory().'/functions_design_spacs.php' );
include( get_template_directory().'/functions_power_spacs.php' );
include( get_template_directory().'/functions_display_spacs.php' );
include( get_template_directory().'/functions_common.php' );
include( get_template_directory().'/performance_spacs.php' );
include( get_template_directory().'/storage_spacs.php' );
include( get_template_directory().'/device_spacs.php' );
include( get_template_directory().'/spacs.php' );
include( get_template_directory().'/signal_spacs.php' );

include( get_template_directory().'/functions_spacs.php' );




include( get_template_directory().'/input_spacs.php' );
include( get_template_directory().'/post_functions.php' );
include( get_template_directory().'/adsence_functions.php' );
include( get_template_directory().'/image_functions.php' );
