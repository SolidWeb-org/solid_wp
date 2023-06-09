<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( $selctSource == 'repeater' ){
	$tsize='';
	if(	$imgID ){
		$featured_image = tp_get_image_rander($imgID, $tsize);
	}else{
		$featured_image = l_theplus_get_thumb_url();
		$featured_image = '<img src="'.esc_url($featured_image).'" alt="'.esc_attr($tmTitle).'">';
	}
}else{
	global $post;
	$postid = get_the_ID();
	$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

	if( !empty($featured_image_url) ){
		if(!empty($layout) && $layout == 'grid'){
			$featured_image = tp_get_image_rander( get_the_ID(), 'tp-image-grid', [], 'post' );
		}else if(!empty($layout) && $layout=='masonry'){
			$featured_image = tp_get_image_rander( get_the_ID(), 'full', [], 'post' );
			
		}else{
			$featured_image = tp_get_image_rander( get_the_ID(), 'full', [], 'post' );
		}
	}else{
		$featured_image = l_theplus_get_thumb_url();
		$featured_image = '<img width="600" height="600" loading="lazy" src="'.esc_url($featured_image).'" data-src="'.esc_url($featured_image).'" class="tp-lazyload" alt="'.esc_attr(get_the_title()).'">';
	}
}

?>

<div class="team-profile">
	<span class="thumb-wrap"><?php echo $featured_image; ?></span>
	<div class="tp-image-overlay"></div>
</div>