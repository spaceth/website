<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
        wp_head();
        if ( function_exists( 'plant_css' ) ) { plant_css(); }
        if ( function_exists( 'plant_var' ) ) { plant_var(); }
    ?>

    <script type="f4d0f6fe6995d17845ee78d2-text/javascript">window.fbAsyncInit = function() {
      FB.init({
        appId      : '1879673859023272',
        cookie     : true,
        xfbml      : true,
        version    : 'v2.8'
      });
      FB.AppEvents.logPageView();
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));</script>



     <script type="f4d0f6fe6995d17845ee78d2-text/javascript">window.fbAsyncInit = function() {
          FB.init({
            appId      : '1879673859023272',
            cookie     : true,
            xfbml      : true,
            version    : 'v2.8'
          });
          FB.AppEvents.logPageView();
        };

        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_US/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));</script>



         <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-100814713-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-100814713-1');
    </script>


</head>

<?php $bodyClass = ''; ?>

<body <?php body_class($bodyClass); ?>>
    <?php
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }
    $headerClass = 's-' . $GLOBALS['s_header_style_m'] . '-m s-' . $GLOBALS['s_header_style_d'] .  '-d -' . $GLOBALS['s_header_layout'];
    if($GLOBALS['s_header_effect'] == 'overlay') {
        $headerClass .= ' -overlay';
    }
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>
    <div id="page" class="site">

        <header id="masthead" class="site-header _heading <?php echo $headerClass; ?>">

            <div class="s-container">
                <div class="site-branding">
                  <a href="<?php echo get_home_url(); ?>">
                    <div class="site-logo">SPACETH.CO</div>
                  </a>
                </div>

                <div class="action-left">
                    <?php seed_header_action($GLOBALS['s_left_area'], $GLOBALS['s_left_area_phone'], $GLOBALS['s_left_area_custom'] ); ?>
                </div>

                <div class="action-right">
                    <?php seed_header_action($GLOBALS['s_right_area'], $GLOBALS['s_right_area_phone'], $GLOBALS['s_right_area_custom'] ); ?>
                </div>

                <nav id="site-nav-d" class="site-nav-d _desktop">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );?>
                </nav>

            </div>

        </header>

        <header class="mobile-header-only">
          <div class="site-branding">
            <a href="<?php echo get_home_url(); ?>">
              <div class="site-logo">SPACETH.CO</div>
            </a>
          </div>
              <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );?>
        </header>

        <div class="s-modal -full" data-s-modal="site-search">
            <span class="s-modal-close"><i class="si-cross-o"></i></span>
            <?php get_search_form(); ?>
        </div>


        <div id="content" class="site-content">
