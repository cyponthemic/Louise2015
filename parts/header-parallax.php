<?php global $post ;?>
<?php 
	//define the tilte
	if(is_front_page()):
	$bigtitle="LOUISE";
	else: $bigtitle= get_the_title();
	endif;	
?>
<?php
	//define background
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 		'large', false, '' );
?>
<section id="header-parallax" style="background-image:url(<?php echo $src[0];?>);"
data-0="background-position: 50% 100%;"
data-500="background-position: 50% 0%;"
>
	<div class="inner-table" >
		
		<h1><?php echo $bigtitle; ?></h1>
	</div>
</section>