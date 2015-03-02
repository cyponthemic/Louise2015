<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-8 large-centered hero columns" role="main">

	<?php do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class('') ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				
			</header>
			<?php do_action('foundationPress_post_before_entry_content'); ?>
			<div class="entry-content">

			<?php the_content(); ?>
			</div>
		</article>
	</div>
</div>
			<?php
			$childargs = array(
					'post_type' => 'planche',
					'numberposts' => -1,					
					'order' => 'ASC',
					'orderby' => 'meta_value_num',
					'meta_key'=>'wpcf-pages'
					
					);
				
			    
				$child_posts = get_posts($childargs);
				
				
				foreach ($child_posts as $child_post) :setup_postdata( $child_post );
				$category = get_the_category($child_post->ID);
				$post=$child_post;
							?>
<div class="row">
				<div class="planche large-10 large-centered columns">
					<h1><?php echo get_the_title($child_post->ID) ;?></h1>
					
					<img src="<?php echo types_render_field("image-planche", array("url"=>true,"size"=>'large'));	?>">
				</div>
</div>
			<?php endforeach;?>
<div class="row">
	<div class="small-12 large-12 large-centered dossier columns" role="main">		
				<article class="">
				<h1>Dossier</h1>
					<?php echo types_render_field("dossier",array("output"=>"normal")); ?>
				</article>
	</div>
</div>	
	<?php endwhile;?>

	<?php do_action('foundationPress_after_content'); ?>

	</div>
	
</div>
<?php get_footer(); ?>
