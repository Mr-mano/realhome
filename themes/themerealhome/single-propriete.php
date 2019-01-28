<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
<div class="bloc-globale-details">
    <div class="libelle">
        <h2><?php the_field('libelle')?></h2>
    </div> 
    <div class="container-detail">
        
        <div class="bloc-photo">
            <?php $image = get_field('photo'); ?>
                <?php if( !empty($image) ): ?>
                    <img class="photo-detail" src="<?php echo $image['url']; ?>" alt=""/>
                <?php endif; ?>
        </div>
        <div class="description">
            <div class="bloc-prix">
                <img class="picto" src="images/picto-single-prop.png" alt="">
                <h2><?php the_field('prix')?></h2>
            </div>
            <div class="bloc-ville">
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
            </div> 
            <div class="info-propriete">
                <div class="titre-info">
                <p>Superficies : </p>
                <p>Nb de chambre(s) : </p>
                <p>Nb de salle(s) de bain : </p>
                </div>
                <div class="retour-info">
                <p><strong><?php the_field('superficie')?></strong></p>
                <p><strong><?php the_field('chambres')?></strong></p>
                <p><strong><?php the_field('salles_de_bain')?></strong></p>
                </div>
            </div>
            <div class="texte">
                <p><?php the_content()?></p>
            </div>
    </div>    

</div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>
</div>


    <?php
    $args = array(
    'post_type' => 'propriete',
    'posts_per_page' => 4,
    'order' => 'ASC',
    );
?>

<?php $the_query = new WP_Query($args);?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="titre-nos-propriete">
            <div>
                <p class="nos">Nos</p>
            </div>
            <div>
                <h3 class="propriete">propriétés</h3>
            </div>
        </div>
<div class="bloc-miniatures">
    
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="bloc-page-proprietes-miniatures">
            <div class="card-propriete-miniatures">
            <a href="<?php the_permalink() ?>">
                <?php $image = get_field('photo'); ?>
                <?php if( !empty($image) ): ?>
                    <img class="photo-miniatures" src="<?php echo $image['url']; ?>" alt=""/>
                <?php endif; ?>
                <?php if( get_field('libelle') ):?>
                    <h4><?php the_field('libelle'); ?></h4>
                    <div class="bloc-ville-miniatures">
            <?php $id = get_the_ID();
                $terms = get_the_terms($id, 'villes');
                if( $terms ): ?>
	                <?php foreach( $terms as $term ): ?>
		            <?php $term->name; ?>
                    <?php $term->description; ?>
                    <?php get_term_link( $term ); ?>
		            <h4><?php echo $term->name; ?></h4>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div> 
                <?php endif  ?>
            </div>
    </div> 
    </a>
        <?php endwhile; ?>
        </div>
<?php endif; ?>

        

<?php get_footer(); ?>
