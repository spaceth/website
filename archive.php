<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package seed
 */
get_header(); ?>


<div class="s-container main-body <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>


            <header class="page-header archive-header">

              <?php if (is_category('podcast')) : ?>

                <span class="site-logo">SPACETH.CO</span>
                <span class="x-sign"> x <span>
                <span class="partner-logo gettalks"> </span>

              <?php elseif (is_category('futurism')) : ?>

                <span class="site-logo">SPACETH.CO</span>
                <span class="x-sign"> x <span>
                <span class="partner-logo ftl"> </span>

              <?php else: ?>

                <h3><span class="site-logo">SPACETH.CO</span> COLUMN</h3>

              <?php endif; ?>


                  <div class="info">
					         <h1><?php echo the_archive_title(); ?></h1>
                   <h2><?php echo get_the_archive_description() ?></h2>
                 </div>

            </header>


          <?php if (is_category('podcast')) : ?>


            <?php
                echo '<div class="s-grid -m2 -d4">';
                while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content-headline', $GLOBALS['s_blog_template']);
                endwhile;
                echo '</div>';
                seed_posts_navigation();
            ?>

          <?php else: ?>

            <?php
                echo '<div class="s-grid -m1 -d3 first-child-full-4">';
                while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
                endwhile;
                echo '</div>';
                seed_posts_navigation();
            ?>

          <?php endif; ?>





            <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

            <div style="padding:20px 0;" class="section-separator">
              <a href="https://spaceth.co/category/futurism">
              <h1>Discover</h1>
            </a>
            </div>

              <?php dynamic_sidebar( 'cloudtag' ); ?>

            <div class="section-separator">
              <h1>In Coversation</h1>
              <h4>เรื่องราวน่าสนใจที่กำลังเป็นบทสนทนา</h4>
            </div>

            <div class="home-widget-banner s-grid -m2 -d4">

              <div class="widget-grid">
                <?php dynamic_sidebar( 'inconversation1' ); ?>
              </div>

              <div class="widget-grid">
                <?php dynamic_sidebar( 'inconversation2' ); ?>
              </div>

              <div class="widget-grid">
                <?php dynamic_sidebar( 'inconversation3' ); ?>
              </div>

              <div class="widget-grid">
                <?php dynamic_sidebar( 'inconversation4' ); ?>
              </div>

            </div>

        </main>
    </div>

</div>
<?php get_footer(); ?>
