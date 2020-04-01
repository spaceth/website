<?php get_header(); ?>


<div class="s-container main-body <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

          <br/> <br/>

        <?php
				query_posts('showposts=1&category_name=feature');
				echo '<div class="s-grid -m1 -d1">';
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-caption-banner', $GLOBALS['s_blog_template']);
				endwhile;
				echo '</div>';
			wp_reset_query();
			?>

      <h1>Featured</h1>
			<?php
			query_posts('showposts=5&category_name=feature');
			echo '<div class="s-grid -m2 -d3 first-child-full-4">';
			while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
			endwhile;
			echo '</div>';
			wp_reset_query();
		?>

    <span class="social-media-lines">
    <a href="https://facebook.com/spaceth"><i class="si-facebook-squared"></i></a>
    <a href="https://twitter.com/spacethnews"><i class="si-twitter"></i></a>
    <a href="https://instagram.com/spaceth.co"><i class="si-instagram"></i></a>
    <a href="https://facebook.com/about"><i class="si-mail"></i></a>
    </span>

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



		<div class="section-separator">
      <a href="https://spaceth.co/category/futurism">
			<h1>Futurism</h1>
			<h4>โลกอนาคต การใช้ชีวิตในอวกาศ และปลายทางของมนุษยชาติ</h4>
    </a>
		</div>
		<?php
		query_posts('showposts=6&category_name=futurism');
		echo '<div class="s-grid -m1 -d3 first-child-full-2">';
		while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
		endwhile;
		echo '</div>';
		wp_reset_query();
	?>

  <div class="section-separator">
    <a href="https://spaceth.co/category/podcast"><h1>Podcast</h1>
    <h4>ฟังเรื่องราวอวกาศ วิทยาศาสตร์ ฟิสิกส์ และอนาคต</h4>
    </a>
    <br/>
    <?php
    query_posts('showposts=4&category_name=podcast');
    echo '<div class="s-grid -m2 -d4">';
    while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/content-headline', $GLOBALS['s_blog_template']);
    endwhile;
    echo '</div>';
    wp_reset_query();
  ?>
  </div>

  <div style="padding:20px 0;" class="section-separator">
    <a href="https://spaceth.co/category/futurism">
    <h1>Discover</h1>
  </a>
  </div>

    <?php dynamic_sidebar( 'cloudtag' ); ?>

						<div class="section-separator">
              <a href="https://spaceth.co/category/interview">
							<h1>Interviews</h1>
							<h4>เรื่องราว บทสัมภาษณ์ บทสนทนา</h4>
            </a>
						</div>
						<?php
						query_posts('showposts=4&category_name=interview');
						echo '<div class="s-grid -m1 -d3 first-child-full">';
						while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
						endwhile;
						echo '</div>';
						wp_reset_query();
					?>



					<div class="section-separator">
            <a href="https://spaceth.co/category/science">
						<h1>Science</h1>
						<h4>วิทยาศาสตร์ ทฤษฎี และการค้นพบใหม่</h4>
          </a>
					</div>
					<?php
					query_posts('showposts=6&category_name=science');
					echo '<div class="s-grid -m1 -d3 first-child-full-5">';
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
					endwhile;
					echo '</div>';
					wp_reset_query();
				?>

        <div class="section-separator">
          <a href="https://spaceth.co/category/spacecraft">
          <h1>Spacecraft</h1>
          <h4>ยานอวกาศ การเดินทางสู่อวกาศ และการสำรวจใหม่</h4>
        </a>
        </div>
        <?php
        query_posts('showposts=6&category_name=spacecraft');
        echo '<div class="s-grid -m1 -d3">';
        while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
        endwhile;
        echo '</div>';
        wp_reset_query();
      ?>

      <div class="section-separator">
        <a href="https://spaceth.co/category/arts">
        <h1>Humanity</h1>
        <h4>ศิลปะ วิทยาศาสตร์ และความเป็นมนุษย์</h4>
      </a>
      </div>
      <?php
      query_posts('showposts=6&category_name=arts');
      echo '<div class="s-grid -m1 -d3 first-child-full-3">';
      while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
      endwhile;
      echo '</div>';
      wp_reset_query();
    ?>

				<div class="section-separator">
          <a href="https://spaceth.co/category/article">
					<h1>Story</h1>
					<h4>รวมเรื่องราวน่าสนใจหลากหลาย</h4>
        </a>
				</div>
				<?php
				query_posts('showposts=10&category_name=article');
				echo '<div class="s-grid -m1 -d3 first-child-full-2">';
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-card', $GLOBALS['s_blog_template']);
				endwhile;
				echo '</div>';
				wp_reset_query();

			?>

        </main>
    </div>


<?php get_footer(); ?>
