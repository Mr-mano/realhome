<?php get_header(); ?>
<div class="bloc-villes">
	<div class="lien-villes hvr-underline-from-center">
		<a href="<?php the_permalink() ?>">Tous</a>
		<?php $villes = get_terms('villes', array(
		'hide_empty' => false,
		)); ?>
		<?php foreach ($villes as $ville) { ?>
		<a href="<?php echo get_term_link($ville->slug, 'villes'); ?>"><?php echo $ville_name = $ville->name; ?></a>
		<?php } ?>
	</div>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
<div class="bloc-single-ville">
		<div class="propriete-card">
				<?php
				$id = get_the_ID();
				$terms = get_the_terms( $id, 'villes' );

				if ( $terms ): ?>
					<?php foreach ( $terms as $term ): ?>
						<h3><?php echo $term->name; ?></h3>
					<?php endforeach; ?>
					<h2><?php the_title()?></h2>
					<a href="<?php the_permalink() ?>">
					<?php $image = get_field('photo'); ?>
                		<?php if( !empty($image) ): ?>
                    		<img class="photo" src="<?php echo $image['url']; ?>" alt=""/>
                		<?php endif; ?>
						</a>
				<?php endif; ?>

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
			
		</div>
</div>

	<?php endwhile;?>
	</div>
<?php endif;?>

<?php get_footer(); ?>