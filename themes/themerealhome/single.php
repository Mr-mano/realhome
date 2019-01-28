<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    
		<?php while ( have_posts() ) : the_post(); ?>
<div class="bloc-single">
		<div class="bloc-single-article">
				<h3><?php the_title()?></h3>
			<div class="bloc-single-image" style="background-image:url('<?php the_post_thumbnail_url('full')?>')">
			</div>
			<div class="bloc-single-texte">
				<?php the_content();?>
			</div>
			<div class="commentaires">
				<?php comments_template();?>
			</div>
		</div>
		
		<?php endwhile; ?>
	<?php endif; ?>
	
	<aside>
    	<?php if ( !function_exists('dynamic_sidebar' ) || !dynamic_sidebar('sidebar')) : ?>
    	<?php endif;?>
	</aside>
</div>