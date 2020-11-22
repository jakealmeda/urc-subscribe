<?php
/**
 * Plugin Name: URC Subscribe
 * Description: Handle all the ads for the site and pulled via shortcode
 * Version: 4.2
 * Author: Jake Almeda
 * Author URI: http://smarterwebpackages.com/
 * Network: true
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

require_once( 'mailchimp-embed.php' );

//add_action( 'genesis_before_content_sidebar_wrap', 'urc_subscribe_function' ); // original
add_action( 'genesis_before_content', 'urc_subscribe_function' );
function urc_subscribe_function() {

	?>

	<aside class="module subscribe">
	<?php

		$donate_page = get_permalink( '26341' ); // there might be more than 1 donate page with the same slug

		$upload_dir = wp_upload_dir();
		$free_ebook_page = get_permalink( get_page_by_path( "free-ebook" ) );
		$products_page = get_permalink( get_page_by_path( "products" ) );

    	$list_pages = array(
    		'members-section',
    		'free-ebook',
    		'bookone-audio',
    		'booktwo-ebook',
    	);

    	global $post; //$post->ID
    	if( in_array( $post->post_name, $list_pages ) ) {
    		$hide_on_these_pages = '';

    		// insert original subscribe pane if free-ebook page
    		if( $post->post_name == 'free-ebook' ) {
    			$hide_on_these_pages = setup_original_subsribe();
    		}
    	} else {
    		$hide_on_these_pages = '';
    	}

		$content = $hide_on_these_pages.'<div class="group grid-cta-icon">
				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="'.$free_ebook_page.'" data-type="page"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-free-ebook-icon.png" alt="" class="wp-image-41165" width="50" height="50"></a></div>
					<div class="items info"><div><a class="item title link" href="'.$free_ebook_page.'" data-type="page" data-id="1519">Free eBook & Audio Program</a></div></div>
				</div></div>

				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="'.$products_page.'" data-type="page"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-coaching-icon.png" alt="" class="wp-image-41163" width="50" height="50"></a></div>
					<div class="items info"><div><a class="item title link" href="'.$products_page.'" data-type="page" data-id="1519">Phone/Skype Coaching Session</a></div></div>
				</div></div>
				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="https://teespring.com/stores/coach-corey-wayne"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-products-icon.png" alt="" class="wp-image-41161" width="50" height="50"></a></div>
					<div class="items info"><div><a class="item title link" href="https://teespring.com/stores/coach-corey-wayne">Coach Corey Wayne Merchandise</a></div></div>
				</div></div>
				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="'.$donate_page.'" data-type="page" ><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-donate-icon.png" alt="" class="width="50" height="50"></a></div>
					<div class="items info"><div><a class="item title link" href="'.$donate_page.'" data-type="page">Support My Work</a></div></div>
				</div></div>
				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="'.$products_page.'" data-type="page"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-all-books-icon.png" alt="" class="wp-image-41162" width="50" height="50"></a></div>
					<div class="items info"><div><a class="item title link" href="'.$products_page.'" data-type="page">Products, Coaching, Books & More</a></div></div>
				</div></div>
			</div>';

	    $content = apply_filters( 'the_content', $content );
	    $content = str_replace( ']]>', ']]&gt;', $content );
	    echo $content;

	?></aside><?php

}