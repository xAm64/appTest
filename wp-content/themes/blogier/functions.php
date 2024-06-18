<?php
/**
 * Theme functions and definitions
 *
 * @package Blogier
 */

if ( ! function_exists( 'blogier_enqueue_styles' ) ) :
	/**
	 * @since 0.1
	 */
	function blogier_enqueue_styles() {
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'blogus-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'blogier-style', get_stylesheet_directory_uri() . '/style.css', array( 'blogus-style-parent' ), '1.0' );
		wp_dequeue_style( 'blogus-default',get_template_directory_uri() .'/css/colors/default.css');
		wp_enqueue_style( 'blogier-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		wp_enqueue_style( 'blogier-dark', get_stylesheet_directory_uri() . '/css/colors/dark.css');

		if(is_rtl()){
			wp_enqueue_style( 'blogus_style_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css' );
	    }
		
	}

endif;
add_action( 'wp_enqueue_scripts', 'blogier_enqueue_styles', 9999 );

$args = array(
    'default-color' => '#fff',
    'default-image' => '',
	);
add_theme_support( 'custom-background', $args );

function blogier_customizer_rid_values($wp_customize) {
}

add_action( 'customize_register', 'blogier_customizer_rid_values', 1000 );

function blogier_theme_setup() {

	//Load text domain for translation-ready
	load_theme_textdomain('blogier', get_stylesheet_directory() . '/languages');

	require( get_stylesheet_directory() . '/hooks/hook-header-four.php' );
	require( get_stylesheet_directory() . '/customizer-default.php' );
	require( get_stylesheet_directory() . '/frontpage-options.php' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );

} 
add_action( 'after_setup_theme', 'blogier_theme_setup' );


if (!function_exists('blogier_get_block')) :
    /**
     *
     *
     * @since Blogier 1.0.0
     *
     */
    function blogier_get_block($block = 'grid', $section = 'post')
    {

        get_template_part('hooks/blocks/block-' . $section, $block);

    }
endif;


if ( ! function_exists( 'blogier_blog_content' ) ) :
    function blogier_blog_content() { 
      $blogus_blog_content  = get_theme_mod('blogus_blog_content','excerpt');

      if ( 'excerpt' == $blogus_blog_content ){
      $blogus_excerpt = blogus_the_excerpt( absint( 15 ) );
      if ( !empty( $blogus_excerpt ) ) :                   
          echo wp_kses_post( wpautop( $blogus_excerpt ) );
           endif; 
      } else{ 
       the_content( __('Read More','blogier') );
        }
	}
endif;


function blogeir_bg_image_wrapper(){
	?>
	<div class="blogeir-background-wrapper">
		<div class="squares">
			<span class="square"></span>
			<span class="square"></span>
			<span class="square"></span>
			<span class="square"></span>
			<span class="square"></span>
		</div>
		<div class="circles">
			<span class="circle"></span>
			<span class="circle"></span>
			<span class="circle"></span>
			<span class="circle"></span>
			<span class="circle"></span>
		</div>
		<div class="triangles">
			<span class="triangle"></span>
			<span class="triangle"></span>
			<span class="triangle"></span>
			<span class="triangle"></span>
			<span class="triangle"></span>
		</div>
	</div>
	<?php
} 
add_action('wp_footer','blogeir_bg_image_wrapper');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogier_widgets_init() {

	$blogus_footer_column_layout = esc_attr(get_theme_mod('blogus_footer_column_layout',3));
	
	$blogus_footer_column_layout = 12 / $blogus_footer_column_layout;
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'blogier' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );


	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'blogier' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-'.$blogus_footer_column_layout.' rotateInDownLeft animated bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'blogier_widgets_init' );