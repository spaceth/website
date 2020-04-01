<?php get_header();

$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
$author->ID;

?>

<div class="s-container main-body">
    <div id="primary" class="content-area <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">
        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>

              <br/><br/><br/><br/><br/>

                              <h3><span class="site-logo">SPACETH.CO</span> WRITER</h3>
            <header class="archive-header archive-header-author s-grid -d2 -m1">

              <div class="pic">
                  <?php echo get_avatar( $author->ID, apply_filters( 'author_bio_avatar_size', 300 ) ); ?>
              </div>

                <div class="info">
                  <h1 style="font-size:40px;"><?php echo the_archive_title(); ?></h1>
                  <h2><?php echo get_the_archive_description() ?></h2>

                </div>


            </header>

            <hr/>

            <h2>บทความโดย <?php echo the_archive_title(); ?></h2>
            <br/>

            <?php
				echo '<div class="s-grid -m1 -d3 first-child-full-4">';
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
				endwhile;
				echo '</div>';
				seed_posts_navigation();
			?>

            <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

        </main>
    </div>


</div>
<?php get_footer(); ?>
