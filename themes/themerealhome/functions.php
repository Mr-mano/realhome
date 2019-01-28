<?php
add_action('wp_enqueue_scripts', 'insert_css');
function insert_css() {

    // On ajoute le css general du theme
    wp_enqueue_style('style', get_stylesheet_uri());

    // On ajoute le jQuery au thème
    wp_register_script('jquery2','https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js');
    wp_enqueue_script('jquery2');

    wp_register_script('fa fontawesome','href="https://use.fontawesome.com/releases/v5.6.3/css/all.css');
    wp_enqueue_script('fontawesome');
}


add_action("wp_footer", "footer_text");
// Définir ‘footer_text'
function footer_text()
{
    //echo "<p style='color:black'>Bienvenue aux cours de Digital Campus</p><br/>";
}
// Insertion menu back office
add_theme_support('menus');
register_nav_menus(array(
    'menu-principal' => 'Navigation principale',
    'menu-secondaire' => 'Navigation secondaire',
    'menu-footer' => 'Navigation footer'
));

// Insertion sidebar back office
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'sidebar',
'before_widget' => '<div>',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

function create_post_type() { 
    register_post_type('propriete',
        array(
            'label'                 => __('Propriété'),
            'singular_label'        => __('Propriété'),
            'add_new_item'          => __( 'Ajouter une Propriété' ),
            'edit_item'             => __( 'Modifier une Propriété' ),
            'new_item'              => __( 'Nouvelle Propriété' ),
            'view_item'             => __( 'Voir la Propriété' ),
            'search_items'          => __( 'Rechercher une Propriété' ),
            'not_found'             =>  __( 'Aucune Propriété trouvée' ),
            'not_found_in_trash'    => __( 'Aucune Propriété trouvée' ),
            'public'                => true,
            'show_ui'               => true,
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_icon'             => 'dashicons-admin-tools',
            'taxonomies'            => array('types'),
            'supports'              => array( 'title', 'editor', 'thumbnail'),
            'rewrite'               => array('slug' => 'propriete', 'with_front' => true)
        )
    );
}
function themes_taxonomy() {
    register_taxonomy(
        'villes',
        'propriete',
        array(
            'label' => 'Ville',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'ville',
                'with_front' => true
            ),
            'hierarchical' => true,
        )
    );
}

/* Fonction d'affichage des commentaires */
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
    <div class="comment-author vcard"><?php
    if ( $args['avatar_size'] != 0 ) {
        echo get_avatar( $comment, 100 );
    }
    printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
    </div><?php
    if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php
    } ?>
    <div class="comment-right">

    <?php comment_text(); ?>

    <div class="comment-footer">
        <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                /* translators: 1: date, 2: time */
                printf(
                    __('%1$s'),
                    get_comment_date()
                ); ?>
            </a><?php
            edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </div>

        <div class="comment-sep"></div>

        <div class="reply"><?php
            comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']
                    )
                )
            ); ?>
        </div>
    </div>
    </div><?php
    if ( 'div' != $args['style'] ) : ?>
        </div><?php
    endif;
}


add_action( 'init', 'themes_taxonomy');
add_action( 'init', 'create_post_type' );
add_theme_support('post-thumbnails');
?>