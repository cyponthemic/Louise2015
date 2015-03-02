<?php get_header(); ?>

<div class="row hero">
	<div class="small-12 large-5 large-centered columns" role="main">

	<?php do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action('foundationPress_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action('foundationPress_page_before_comments'); ?>
			<?php comments_template(); ?>
			<?php do_action('foundationPress_page_after_comments'); ?>
		</article>
	<?php endwhile;?>

	<?php do_action('foundationPress_after_content'); ?>

	</div>
	
</div>

<div class="row recap">
	<div class="large-3 columns">
		<h1 class="titre hide-for-large">ABOUT</h1>
		<a href="louise" class="about-page page-link">
			<div class="overlay show-for-large-only">
				<h1 class="titre">ABOUT</h1>
			</div>
		</a>
	</div>
	
	<?php
	$args = array( 'post_type' => 'project', 'posts_per_page' => 1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	$src2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 		'large', false, '' );
	$featured_title=get_the_title();
	$featured_link=get_the_permalink();
	endwhile; 
	?>
	
	
	<div class="large-7 large-offset-2 columns">
	<h1 class="titre hide-for-large">A LA UNE : <?php echo $featured_title; ?></h1>
		<a href="<?php echo $featured_link; ?>"class="featured-page page-link" style="background-image:url('<?php echo $src2[0]; ?>');">
			<div class="overlay show-for-large-only">
				<h1 class="titre">A LA UNE : <?php echo $featured_title; ?></h1>
			</div>
		</a>
	</div>
	<div class="large-6 columns">
	<h1 class="titre hide-for-large">PROJETS</h1>
		<a href="projects" class="projects-page page-link">
			<div class="overlay show-for-large-only">
				<h1 class="titre">PROJETS</h1>
			</div>
		</a>
	</div>
	<div class="large-3 large-offset-3 columns">
	<h1 class="titre hide-for-large">CONTACT</h1>
		<a href="contact" class="contact-page page-link">
			<div class="overlay show-for-large-only">
				<h1 class="titre">CONTACT</h1>
			</div>
		</a>
	</div>
</div>
<?php get_footer(); ?>
