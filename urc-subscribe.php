<?php
/**
 * Plugin Name: URC Subscribe
 * Description: Handle all the ads for the site and pulled via shortcode
 * Version: 4.1
 * Author: Jake Almeda
 * Author URI: http://smarterwebpackages.com/
 * Network: true
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//add_action( 'genesis_before_content_sidebar_wrap', 'urc_subscribe_function' ); // original
add_action( 'genesis_before_content', 'urc_subscribe_function' );
function urc_subscribe_function() {

	?>
	<style>
		@media screen and (min-width: 768px) {
			.module.subscribe {
			    display: none;
			}
		}
		.module.subscribe {
			border: 1px solid #ccc;
			margin-bottom: 1.5rem;
		}
	</style>

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
    	} else {
    		$hide_on_these_pages = '<div class="module cta-main margin-bottom"><div class="module-wrap">
										<div><a class="item image link" href="'.$free_ebook_page.'" data-type="page" data-id="1536" data-id="freeebook"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-free-ebook.jpg" alt="" class="wp-image-41159"/></a></div>
										<div class="items info"><h2><a class="item title link" href="'.$free_ebook_page.'">Get eBook for FREE!</a></h2><a class="item cta button" href="'.$free_ebook_page.'">CLICK HERE</a><div class="item info fontsize-smaller margin-smaller-top">* When you signup for our newsletter</div></div>
									</div></div>
									<div class="fontsize-tiny color-darkgray margin-bottom">Click on the link above to go to a page where you can enter your email to gain access to FREE Digital Online Versions of my popular eBooks &amp; audio course. When you click the “Instant Access” button, you will gain access to the members area of my website to read my eBooks, &amp; listen to the audio lessons right in your web browser! You’ll also get my best pickup, dating, relationship &amp; life success secrets &amp; strategies in my FREE newsletter. All information is 100% confidential.</div>';
    	}

		
		$content = $hide_on_these_pages.'<div class="group grid-2columns margin-bottom">
				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="'.$products_page.'" data-type="page" data-id="1519"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-coaching-icon.png" alt="" class="wp-image-41163" width="50" height="50"></a></div><div class="items info"><h3><a class="item title link" href="'.$products_page.'" data-type="page" data-id="1519">Coaching</a></h3><div><a class="item cta link" href="'.$products_page.'" data-type="page" data-id="1519">Click To View</a></div></div>
				</div></div>
				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="https://teespring.com/stores/coach-corey-wayne"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-products-icon.png" alt="" class="wp-image-41161" width="50" height="50"></a></div><div class="items info"><h3><a class="item title link" href="https://teespring.com/stores/coach-corey-wayne">Buy Merch</a></h3><div><a class="item cta link" href="https://teespring.com/stores/coach-corey-wayne">Click To View</a></div></div>
				</div></div>
				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="'.$donate_page.'" data-type="page" data-id="26341"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-donate-icon.png" alt="" class="wp-image-41164" width="50" height="50"></a></div><div class="items info"><h3><a class="item title link" href="'.$donate_page.'" data-type="page" data-id="26341">Donate</a></h3><div><a class="item cta link" href="'.$donate_page.'" data-type="page" data-id="26341">Click To View</a></div></div>
				</div></div>
				<div class="module cta-icon"><div class="module-wrap">
					<div><a class="item image link" href="'.$products_page.'" data-type="page" data-id="1519"><img src="'.$upload_dir[ "baseurl" ].'/cta-mobile-all-books-icon.png" alt="" class="wp-image-41162" width="50" height="50"></a></div><div class="items info"><h3><a class="item title link" href="'.$products_page.'" data-type="page" data-id="1519">All Books</a></h3><div><a class="item cta link" href="'.$products_page.'" data-type="page" data-id="1519">Click To View</a></div></div>
				</div></div>
			</div>';

	    $content = apply_filters( 'the_content', $content );
	    $content = str_replace( ']]>', ']]&gt;', $content );
	    echo $content;

	?></aside><?php

}