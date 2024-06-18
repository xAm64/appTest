<?php
if (!function_exists('blogier_header_section')) :
    /**
     *
     * @since Blogus
     *
     */
    function blogier_header_section(){ ?>
        <header class="bs-headfour">
        <div class="clearfix"></div>
        <!-- Main Menu Area-->
        <div class="bs-menu-full">
            <nav class="navbar navbar-expand-lg navbar-wp">
                <div class="container">
                <div class="row w-100 align-items-center">
                <!-- Right nav -->
                <div class="col-lg-3">
                    <div class="navbar-header d-none d-lg-block">
                        <div class="site-logo">
                            <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
                        </div>
                        <div class="site-branding-text <?php esc_attr_e( display_header_text() ? '' : 'd-none' ); ?> ">
                            <?php if (is_front_page() || is_home()) { ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
                            <?php } else { ?>
                                <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                            <?php } ?>
                                <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                        </div>
                    </div>
                </div>
                <!-- Mobile Header -->
                <div class="m-header align-items-center p-0">
                <!-- navbar-toggle -->
                <button class="navbar-toggler x collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-wp" aria-controls="navbar-wp" aria-expanded="false"
                    aria-label="Toggle navigation"> 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <div class="navbar-header">
                        <?php the_custom_logo(); ?>
                        <div class="site-branding-text <?php esc_attr_e( display_header_text() ? '' : 'd-none' ); ?> ">
                            <div class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></div>
                            <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                        </div>
                    </div>
                    <div class="right-nav"> 
                    <!-- /navbar-toggle -->
                    <?php $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
                    if($blogus_menu_search == true) {
                    ?>
                        <a class="msearch ml-auto bs_model" data-bs-target="#exampleModal" href="#" data-bs-toggle="modal"> <i class="fa fa-search"></i> </a>
                
                    <?php } ?>
                    </div>
                    </div>
                <!-- /Mobile Header -->
                <div class="col-lg-7">
                <!-- Navigation -->
                <div class="collapse navbar-collapse" id="navbar-wp">
                    <?php $blogus_menu_align_setting = get_theme_mod('blogus_menu_align_setting','mx-auto');
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'container'  => 'nav-collapse collapse',
                            'menu_class' => $blogus_menu_align_setting . ' nav navbar-nav'.(is_rtl() ? ' sm-rtl' : ''),
                            'fallback_cb' => 'blogus_fallback_page_menu',
                            'walker' => new blogus_nav_walker()
                        ) ); ?>
                </div>
                </div>
                <div class="col-lg-2">
                    <!-- Right nav -->
                    <div class="desk-header right-nav pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center justify-content-end">
                        <?php blogus_menu_btns(); ?>               
                    </div>
                </div>
            </div>
        </div>
            </nav>
        </div>
        <!--/main Menu Area-->
        </header>
        <?php
    }
endif;
add_action('blogier_action_header_section', 'blogier_header_section', 40);