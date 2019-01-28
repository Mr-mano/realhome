<?php /* Template Name: proprietes */ ?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="titre-nos-propriete">
            <div>
                <p class="nos">Nos</p>
            </div>
            <div>
                <h3 class="propriete">propriétés</h3>
            </div>
        </div>
    <?php endwhile;?>
<?php endif;?>
<div class="lien-villes hvr-underline-from-center">
        <a href="<?php the_permalink() ?>">Tous</a>
                        <?php $villes = get_terms('villes', array(
                            'hide_empty' => false,
                        )); ?>

                        <?php foreach ($villes as $ville) { ?>
                                <a href="<?php echo get_term_link($ville->slug, 'villes'); ?>"><?php echo $ville_name = $ville->name; ?></a>
                        <?php } ?>

                    
</div>


<?php
    $args = array(
    'post_type' => 'propriete',
    'posts_per_page' => 10,
    'order' => 'ASC',
    );
?>

<?php $the_query = new WP_Query($args);?>

<?php if ( $the_query->have_posts() ) : ?>
    <div class="bloc-page-proprietes">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        
            <div class="card-propriete">
                <a href="<?php the_permalink() ?>">
                <?php $image = get_field('photo'); ?>
                <?php if( !empty($image) ): ?>
                    <img class="photo" src="<?php echo $image['url']; ?>" alt=""/>
                <?php endif; ?>
                <?php if( get_field('libelle') ):?>
                    <h2><?php the_field('libelle'); ?></h2>
                <?php endif  ?>
                
                
                <?php $id = get_the_ID();
                $terms = get_the_terms($id, 'villes');

    if( $terms ): ?>
	<?php foreach( $terms as $term ): ?>

		<?php $term->name; ?>
        <?php $term->description; ?>
        <?php get_term_link( $term ); ?>
		<h3><?php echo $term->name; ?></h3>

	<?php endforeach; ?>
    <?php endif; ?>
                <?php if( get_field('prix') ):?>
                    <h4><?php the_field('prix'); ?></h4>
                <?php endif  ?>
                <div class="detaille-bien">
                    <div class="detailles">
                        <?php if( get_field('superficie') ):?>
                            <p><?php the_field('superficie'); ?></p>
                        <?php endif  ?>
                    </div>
                    <div class="detailles">
                        <?php if( get_field('chambres') ):?>
                            <p>Chambre(s) : <?php the_field('chambres'); ?></p>
                        <?php endif  ?>
                    </div>
                    <div class="detailles">
                        <?php if( get_field('salles_de_bain') ):?>
                            <p>Salle(s) de bain : <?php the_field('salles_de_bain'); ?></p>
                        <?php endif  ?>
                    </div>
                </div>
                </a>
            </div>            
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>