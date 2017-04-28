<?php

/**
 * Template Name: TestPad
 */

// $users = get_users('role=directory_members');
// $user_meta = get_user_meta( 10 );

// $user_meta = array_map( function( $a ){ return $a[0]; }, get_user_meta( 10 ) );
// var_dump($user_meta);


// $user = get_user_by( 'id', 10 );
// var_dump($user);


//var_dump(vp_option('vpt_option'));
// var_dump(vpt_option('posts_per_page'));

if ( function_exists( "display_tweets" ) ) { display_tweets(); } 