<?php /* Template Name: Gabarit contact */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="bloc-contact">
        <h2 class="titre"><?php the_title()?></h2>
        <div style="background-image: url('<?php  the_post_thumbnail_url( 'full' ) ?>')" class="map"></div>
        <div class="container-bloc-form">
            <div class="bloc-form">
                <?php if( get_field('info_contact') ): ?>
                    <h2><?php the_field('info_contact'); ?></h2>
                <?php endif; ?>
                <?php if( get_field('texte_contact') ): ?>
                    <P><?php the_field('texte_contact'); ?></p>
                <?php endif; ?>
                <?php if( get_field('ville_contact') ): ?>
                    <h3><?php the_field('ville_contact'); ?></h3>
                <?php endif; ?>
                <?php if( get_field('tel_contact') ): ?>
                    <h3>Tel : <strong><?php the_field('tel_contact'); ?></strong></h3>
                <?php endif; ?>
                <?php if( get_field('fax_contact') ): ?>
                    <h3>Fax : <strong><?php the_field('fax_contact'); ?></strong></h3>
                <?php endif; ?>
                <?php if( get_field('email_contact') ): ?>
                    <h3>E-mail : <a href=""><?php the_field('email_contact'); ?></a></h3>
                <?php endif; ?>
            </div>
            <?php the_content()?>
        </div>
    </div>
    <?php endwhile;?>
<?php endif;?>
<?php get_footer(); ?>