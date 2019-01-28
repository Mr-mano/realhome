<?php get_header();?>


<?php if (have_posts()): ?>
<?php while (have_posts()) : the_post();?>
<div class="bloc-cateory">
	<div class="bloc-cateory-article">
		<h1><?php the_title()?></h1>
		<div class="bloc-single-image" style="background-image:url('<?php the_post_thumbnail_url('full')?>')">
		</div>
		<div class="bloc-home-texte">
            <p><?php the_excerpt()?></p>
        </div>
        <a class="lire-la-suite hvr-push"href="<?php the_permalink()?>">Lire la suite</a>
		<?php comments_template();?>
		<?php endwhile;?>
		<?php endif; ?>
	</div>
	<aside>
		<?php if ( !function_exists('dynamic_sidebar' ) || !dynamic_sidebar('sidebar')) : ?>
		<?php endif;?>
	</aside>
</div>
<?php get_footer(); ?>