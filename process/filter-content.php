<?php

function wfb_pagebuilder_content( $content ){
   if( !is_page_template('pagebuilder-template.php') ){
        return $content;
    } 

    global $post, $wpdb;
    //$wpfdocs_data        =   get_post_meta( $post->ID, 'wpfdocs_data', true );
    $wpfb_html        =   file_get_contents( 'pagebuilder-content.php', true );

    //$user_IP            =   $_SERVER['REMOTE_ADDR'];

    return $wpfb_html . $content;
}