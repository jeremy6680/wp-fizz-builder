<?php

function wfb_filter_docs_content( $content ){
   if( !is_singular( 'doc' ) ){
        return $content;
    } 

    global $post, $wpdb;
    //$wpfdocs_data        =   get_post_meta( $post->ID, 'wpfdocs_data', true );
    $wpfdocs_html        =   file_get_contents( 'docs-template.php', true );

    //$user_IP            =   $_SERVER['REMOTE_ADDR'];

    return $wpfdocs_html . $content;
}