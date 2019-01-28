<?php get_header(); ?>
<div class="bloc-home">


<?php if (have_posts()) : ?>
<div class="main-home">
    <?php while (have_posts()) : the_post(); ?>

    <div class="bloc-home-article">
    
        <h3><?php the_title()?></h3>
        <div class="bloc-image" style="background-image:url('<?php the_post_thumbnail_url('full')?>')"></div>
        <div class="bloc-home-texte">
            <p><?php the_excerpt()?></p>
        </div>
        <a class="lire-la-suite hvr-push"href="<?php the_permalink()?>">Lire la suite</a>

    </div>
    <div class="separation">
    <hr>
    </div>
    
<?php endwhile;?>
</div>
<?php endif;?>

<aside>
    <?php if ( !function_exists('dynamic_sidebar' ) || !dynamic_sidebar('sidebar')) : ?>
    <?php endif;?>
</aside>
</div>
<?php get_footer(); ?>