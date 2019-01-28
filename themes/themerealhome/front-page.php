<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    
<div class="bloc-actualites" style="background-image:url('<?php the_post_thumbnail_url('full')?>')">
    <div class="h1"><?php the_content()?></div>
</div>
<div class="notre-agence">
            <div class="container-titre">
                <?php if( get_field('titre') ): ?>
                    <h2><?php the_field('titre'); ?></h2>
                <?php endif; ?>
                <?php $image = get_field('tirer');
                if( !empty($image) ): ?>
                    <img class="tirer" src="<?php echo $image['url']; ?>" alt=""/>
                <?php endif; ?>
            </div>
            <div class="container-texte">
                <?php if( get_field('text') ):?>
                    <p><?php the_field('text'); ?></p>
                <?php endif; ?>
            </div>
        </div>
            <div class="container-card">
                <?php if( have_rows('cards') ):?>   
			    <?php	while ( have_rows('cards') ) : the_row();?>
                        <div class="card">
                            <?php the_sub_field('icone'); ?>
                                <h3><?php the_sub_field('libelle');?></h3>
                            <?php the_sub_field('text-card');?>               
                        </div>
                <?php  endwhile;?>
                <?php endif; ?>
            </div>
            <div class="container-global-propriete">
                <div class="container-nos-propriete">
                    <div>
                        <p class="nos">Nos</p>
                    </div>
                    <div>
                        <h3 class="propriete">propriétés</h3>
                    </div>
                </div>
                <div class="trait">
                        <div class="trait-separation"></div>
                </div>
                <div class="text-nos-proprietes">
                    <?php if( get_field('proprietes') ):?>
                    <p><?php the_field('proprietes'); ?></p>
                    <?php endif; ?>
                </div>

                <?php
    $args = array(
    'post_type' => 'propriete',
    'posts_per_page' => 6,
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
            </div>            
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php wp_reset_postdata() ?>
</a>
<div class="tout-voir">
    <a class="bouton hvr-push" href="www.realhome.com/nos-proprietes/">tout voir</a>
</div>
                
            </div>    
    <div class="bloc-nos-agents">          
        <div class="container-global-titre">
                <div class="container-nos-agents-titre">
                    <div class="container-nos">Nos</div>
                    <div class="container-agent">agents</div>
                </div>
                <div class="container-trait-separation">
                    <div class="trait-separation"></div>
                </div>
        </div>      
    <div class="container-global-nos-agents">  
            <div class="photo-agent">
                    <?php $image = get_field('photo_agent');
                    if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt=""/>
                    <?php endif; ?>
            </div>
            <div class="bloc-description-agent">
                <div class="nom-agent">
                    <?php if( get_field('nom_agent') ): ?>
                        <h2><?php the_field('nom_agent'); ?></h2>
                    <?php endif; ?>
                </div>
                <div class="description-agent">
                    <?php if( get_field('description_agent') ): ?>
                        <p><?php the_field('description_agent'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
    </div>        
</div>    
    <div class="bloc-partenaire">
        <?php if( get_field('our_partenaires') ): ?>
            <h2><?php the_field('our_partenaires'); ?></h2>
        <?php endif; ?>
        <?php $image = get_field('techstart');
            if( !empty($image) ): ?>
                <img  class="partenaire" src="<?php echo $image['url']; ?>" alt=""/>
            <?php endif; ?>
        <?php $image = get_field('swan');
            if( !empty($image) ): ?>
                <img  class="partenaire" src="<?php echo $image['url']; ?>" alt=""/>
            <?php endif; ?>
        <?php $image = get_field('audiopro');
            if( !empty($image) ): ?>
                <img  class="partenaire" src="<?php echo $image['url']; ?>" alt=""/>
            <?php endif; ?>  
        <?php $image = get_field('strongware');
            if( !empty($image) ): ?>
                <img  class="partenaire" src="<?php echo $image['url']; ?>" alt=""/>
            <?php endif; ?> 
    </div>      
    <?php endwhile;?>
<?php endif;?>

<?php get_footer(); ?>