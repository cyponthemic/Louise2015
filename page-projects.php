<?php get_header(); ?>

<div class="row">
	<div class="small-12 large-8 large-centered hero columns" role="main">

	

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<?php do_action('foundationPress_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		
		</article>
	<?php 
	
	endwhile;
	wp_reset_postdata();
	?>


	</div>
	
</div>


<?php 
$args = array( 'post_type' => 'project', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
echo '<div class="row projects-archive">';
?>
<?php
	//define background
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 		'large', false, '' );
?>

	<div class="large-10 large-centered columns project-image" style="background-image:url('<?php echo $src[0]; ?>');">
	   
		<a href="<?php the_permalink() ?>">
		<div class="overtitle project-description">
				
				<h1 class="project-title">
					<?php the_title();?>
				</h1>
			
			<p class="project-content">
				<?php the_content();?>
			</p>
		</div>	
		</a>
	</div>
	

<?php 
echo '</div';
endwhile; ?>



<?php get_footer(); ?>
