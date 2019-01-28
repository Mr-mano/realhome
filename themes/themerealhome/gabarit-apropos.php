<?php /* Template Name: Gabarit apropos */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
<div class="bloc-apropos">  
    <h2 class="titre-apropos"><?php the_title();?></h2>
        <div class="bloc-texte-apropos">
            <div class="apropos-image" style="background-image:url('<?php the_post_thumbnail_url('full')?>')"></div>
            <div class="texte-apropos"><?php the_content();?></div>
        </div>
</div>  
        <div class="bloc-card">
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
        </div>
        <div class="container-nos-agents">
                    <div>
                        <p class="nos">Nos</p>
                    </div>
                    <div>
                        <h3 class="agents">agents</h3>
                    </div>
        </div>
        
            <div class="bloc-nos-agents-apropos">
                <?php if( have_rows('nos_agents') ):?>   
			    <?php	while ( have_rows('nos_agents') ) : the_row();?>
                        <div class="card-nos-agents">
                            <?php $image = get_sub_field('photo_agents');?>
                            <img class="nos-agents" src="<?php echo $image['url']; ?>" alt=""/>
                            <h4><?php the_sub_field('nom_agents');?></h4>
                            <p><?php the_sub_field('fonction_agents');?></p>          
                        </div>
                       
                <?php  endwhile;?>
                <?php endif; ?>
                </div> 
        </div>

    <?php endwhile;?>
<?php endif;?>

<?php get_footer(); ?>